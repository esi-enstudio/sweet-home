<?php

namespace App\Filament\Resources\PropertyResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class MediaRelationManager extends RelationManager
{
    protected static string $relationship = 'media';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('type')
                    ->label('Media Type')
                    ->required()
                    ->live() // এটি প্রয়োজন যাতে শর্তভিত্তিক ইনপুট রিয়েলটাইমে আপডেট হয়
                    ->afterStateUpdated(fn (Forms\Set $set) => $set('path', null)) // টাইপ পরিবর্তন করলে ফাইল রিসেট হবে
                    ->options([
                        'gallery' => 'Gallery',
                        'video' => 'Video',
                        'hero' => 'Hero Image',
                        'showcase' => 'Showcase Image',
                        'spotlight' => 'Spotlight Image',
                    ]),

                Forms\Components\TextInput::make('caption')
                    ->label('Common Caption (Optional)')
                    ->placeholder('This caption will be applied to all uploaded images.'),

                // Gallery (Multiple)
                Forms\Components\FileUpload::make('path')
                    ->label('Upload Images')
                    ->multiple()
                    ->reorderable()
                    ->appendFiles()
                    ->image()
                    ->directory('temp-uploads')
                    ->required()
                    ->columnSpanFull(),
//
//                // Hero (Single)
//                Forms\Components\FileUpload::make('hero_image_path')
//                    ->label('Upload Hero Image')
//                    ->image()
//                    ->directory('temp-uploads')
//                    ->required(fn (callable $get) => $get('type') === 'hero')
//                    ->visible(fn (callable $get) => $get('type') === 'hero')
//                    ->columnSpanFull(),
//
//                // Showcase (Single)
//                Forms\Components\FileUpload::make('showcase_image_path')
//                    ->label('Upload Showcase Image')
//                    ->image()
//                    ->directory('temp-uploads')
//                    ->required(fn (callable $get) => $get('type') === 'showcase')
//                    ->visible(fn (callable $get) => $get('type') === 'showcase')
//                    ->columnSpanFull(),
//
//                // Spotlight (Single)
//                Forms\Components\FileUpload::make('spotlight_image_path')
//                    ->label('Upload Spotlight Image')
//                    ->image()
//                    ->directory('temp-uploads')
//                    ->required(fn (callable $get) => $get('type') === 'spotlight')
//                    ->visible(fn (callable $get) => $get('type') === 'spotlight')
//                    ->columnSpanFull(),

                Forms\Components\TextInput::make('video_url')
                    ->label('Video URL')
                    ->placeholder('https://youtube.com/...')
                    ->required(fn (callable $get) => $get('type') === 'video')
                    ->visible(fn (callable $get) => $get('type') === 'video')
                    ->prefix('https://')
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('path')
            ->columns([
                Tables\Columns\ImageColumn::make('path')
                    ->label('Gallery Images')
                    ->extraImgAttributes(['class' => 'rounded-md'])
                    ->width(100)
                    ->height(100),

                Tables\Columns\ImageColumn::make('showcase_image_path')
                    ->label('Showcase Image')
                    ->extraImgAttributes(['class' => 'rounded-md'])
                    ->width(100)
                    ->height(100),

                Tables\Columns\ImageColumn::make('spotlight_image_path')
                    ->label('Spotlight Image')
                    ->extraImgAttributes(['class' => 'rounded-md'])
                    ->width(100)
                    ->height(100),

                Tables\Columns\TextColumn::make('video_url')->searchable()->wrap(),
                Tables\Columns\TextColumn::make('caption')->searchable(),
            ])
            ->deferLoading()
            ->defaultPaginationPageOption(5)
            ->filters([
                //
            ])
            ->headerActions([
                // আমরা CreateAction-এর ডিফল্ট আচরণ পরিবর্তন করব
                Tables\Actions\CreateAction::make()
                    ->icon('heroicon-o-plus')
                    ->label('Add New')
                    ->using(function (array $data, RelationManager $livewire): Model {
                        // ১. প্রপার্টির ইউনিক আইডি নিন
                        $propertyId = $livewire->getOwnerRecord()->property_id;

                        $imagePaths = $data['path'] ??
                            ($data['hero_image_path'] ? [$data['hero_image_path']] : null) ??
                            ($data['showcase_image_path'] ? [$data['showcase_image_path']] : null) ??
                            ($data['spotlight_image_path'] ? [$data['spotlight_image_path']] : null) ??
                            [];

                        $createdRecords = [];

                        foreach ($imagePaths as $tempPath) {
                            $finalPath = $this->processAndSaveImage($tempPath, $propertyId, $data['type']);

                            $createdRecords[] = $livewire->getRelationship()->create([
                                'path' => $finalPath,
                                'type' => $data['type'],
                                'caption' => $data['caption'],
                            ]);
                        }

                        // ফিলামেন্টকে জানানোর জন্য শেষ রেকর্ডটি রিটার্ন করতে হবে
                        return last($createdRecords);
                    }),
            ])
            ->actions([
                // EditAction এখন শুধুমাত্র একটি ছবির ক্যাপশন এডিট করতে ব্যবহৃত হবে
                Tables\Actions\EditAction::make()
                    ->modalHeading('Edit Image Details') // মডালের প্রধান শিরোনাম
                    ->form([
                        Forms\Components\TextInput::make('caption')->label('Image Caption'),

                        Forms\Components\TextInput::make('video_url')
                            ->label('Video URL')
                            ->placeholder('https://youtube.com/...')
                            ->required(fn (callable $get) => $get('type') === 'video_url')
                            ->visible(fn (callable $get) => $get('type') === 'video_url')
                            ->prefix('https://')
                            ->columnSpanFull(),
                    ]),
                Tables\Actions\DeleteAction::make()
                    ->modalHeading('Delete Images')
                    ->modalDescription('Are you sure you want to delete the selected images? This action cannot be undone.'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->modalHeading('Delete Selected Images')
                        ->modalDescription('Are you sure you want to delete all selected images? This action cannot be undone.'),
                ]),
            ])
            ->reorderable('order_column'); // ছবি ড্র্যাগ করে সাজানোর জন্য
    }

    /**
     * একটি প্রাইভেট হেল্পার মেথড যা ছবি প্রসেস এবং সেভ করে।
     */
    private function processAndSaveImage(?string $tempPath, string $propertyId, string $type): ?string
    {
        if (!$tempPath || !Storage::disk('public')->exists($tempPath)) {
            return null;
        }

        try {
            $manager = new ImageManager(new Driver());
            $imageContent = Storage::disk('public')->get($tempPath);
            $image = $manager->read($imageContent)
                ->resize(1200, null, fn ($constraint) => $constraint->aspectRatio())
                ->toJpeg(80);

            $fileName = basename($tempPath);
            // $type অনুযায়ী ফোল্ডারের নাম পরিবর্তন হবে
            $finalPath = "property/{$propertyId}/{$type}/{$fileName}";

            Storage::disk('public')->put($finalPath, (string) $image);
            Storage::disk('public')->delete($tempPath);

            return $finalPath;
        } catch (\Throwable $e) {
            Log::error("Image processing failed for {$type}: " . $e->getMessage());
            return null;
        }
    }
}
