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
                Forms\Components\TextInput::make('caption')
                    ->label('Common Caption (Optional)')
                    ->placeholder('This caption will be applied to all uploaded images.'),

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
                    ->label('Images')
                    ->extraImgAttributes(['class' => 'rounded-md'])
                    ->width(100)
                    ->height(100),

                Tables\Columns\TextColumn::make('type')->searchable(),
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
                    ->form([
                        Forms\Components\Tabs::make('Media')
                            ->tabs([
                                Forms\Components\Tabs\Tab::make('Image')
                                    ->columns(2)
                                    ->schema([
                                        Forms\Components\FileUpload::make('path')
                                            ->label('Upload Images')
                                            ->multiple()
                                            ->reorderable()
                                            ->image()
                                            ->acceptedFileTypes(['image/jpeg', 'image/png'])
                                            ->rules(['mimes:jpg,jpeg,png']) // সার্ভার-সাইড ভ্যালিডেশন
                                            ->directory('temp-uploads')
                                            ->required()
                                            ->columnSpanFull(),

                                        Forms\Components\Select::make('type')
                                            ->label('Media Type')
                                            ->required()
                                            ->options([
                                                'gallery' => 'Gallery',
                                                'hero' => 'Hero',
                                                'showcase' => 'Showcase ',
                                                'spotlight' => 'Spotlight',
                                            ]),

                                        Forms\Components\TextInput::make('caption')
                                            ->label('Caption (Optional)')
                                            ->placeholder('This caption will be applied to all uploaded images.'),

                                        Forms\Components\TextInput::make('width')
                                            ->label('Width (px)')
                                            ->numeric()
                                            ->required(),

                                        Forms\Components\TextInput::make('height')
                                            ->label('Height (px)')
                                            ->numeric()
                                            ->required(),
                                    ]),

                                Forms\Components\Tabs\Tab::make('Video')
                                    ->columns(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('video_url')
                                            ->label('Video URL')
                                            ->placeholder('https://youtube.com/...')
                                            ->prefix('https://'),

                                        Forms\Components\TextInput::make('caption')
                                            ->label('Caption (Optional)')
                                            ->placeholder('This caption will be applied to all uploaded images.'),
                                    ]),
                            ])
                    ])
                    ->using(fn (array $data, RelationManager $livewire): Model => $this->handleCreation($data, $livewire)),
            ])
            ->actions([
                // EditAction এখন শুধুমাত্র একটি ছবির ক্যাপশন এডিট করতে ব্যবহৃত হবে
                Tables\Actions\EditAction::make()
                    ->modalHeading('Edit Image Details'),
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
     * Handles creation of media records.
     * এটি এখন একটি Model ইনস্ট্যান্স রিটার্ন করবে।
     */
    protected function handleCreation(array $data, RelationManager $livewire): Model
    {
        $propertyId = $livewire->getOwnerRecord()->property_id;
        $mediaType = $data['video_url'] ? 'video' : ($data['type'] ?? 'image');

        // ভিডিওর জন্য
        if ($mediaType === 'video') {
            return $livewire->getRelationship()->create($data);
        }

        // ছবির জন্য
        $imagePaths = is_array($data['path']) ? $data['path'] : [$data['path']];
        $createdRecords = [];

        foreach ($imagePaths as $tempPath) {
            $finalPath = $this->processAndSaveImage($tempPath, $propertyId, $mediaType, $data['width'], $data['height']);
            if ($finalPath) {
                $createdRecords[] = $livewire->getRelationship()->create([
                    'path' => $finalPath, 'type' => $mediaType, 'caption' => $data['caption']
                ]);
            }
        }

        // --- এখানে মূল পরিবর্তনটি করা হয়েছে ---

        // যদি কমপক্ষে একটি রেকর্ড তৈরি হয়, তাহলে সর্বশেষটি রিটার্ন করুন
        if (!empty($createdRecords)) {
            return last($createdRecords);
        }

        // যদি কোনো রেকর্ড তৈরি না হয় (ব্যর্থতার ক্ষেত্রে),
        // তাহলে একটি খালি, না-সেভ-হওয়া মডেল ইনস্ট্যান্স রিটার্ন করুন।
        // এটি এরর প্রতিরোধ করবে।
        return $livewire->getRelationship()->make($data);
    }

    /**
     * একটি প্রাইভেট হেল্পার মেথড যা ছবি প্রসেস এবং সেভ করে।
     */
    private function processAndSaveImage(?string $tempPath, string $propertyId, string $type, ?int $width, ?int $height): ?string
    {
        if (!$tempPath || !Storage::disk('public')->exists($tempPath)) {
            Log::warning("Temporary file not found for processing: " . $tempPath);
            return null;
        }

        try {
            $manager = new ImageManager(new Driver());
            $imageContent = Storage::disk('public')->get($tempPath);
            $image = $manager->read($imageContent);

            if ($width && $height) {
                $image->cover($width, $height); // cover() রিসাইজ এবং ক্রপ দুটোই করে
            } else {
                // একটি ফলব্যাক রিসাইজ
                $image->scaleDown(width: 1200);
            }

            $image->toJpeg(80); // কোয়ালিটিসহ JPEG-তে কনভার্ট করুন

            $fileName = basename($tempPath);
            // $type অনুযায়ী সঠিক ফোল্ডারে সেভ করুন
            $finalPath = "property/{$propertyId}/{$type}/{$fileName}";

            Storage::disk('public')->put($finalPath, (string) $image);
            Storage::disk('public')->delete($tempPath);

            Log::info("Image processed and saved to: " . $finalPath);
            return $finalPath;
        } catch (\Throwable $e) {
            Log::error("Image processing failed for type {$type}: " . $e->getMessage());
            return null;
        }
    }
}
