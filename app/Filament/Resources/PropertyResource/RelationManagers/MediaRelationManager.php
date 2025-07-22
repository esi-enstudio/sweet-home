<?php

namespace App\Filament\Resources\PropertyResource\RelationManagers;

use App\Traits\ImageProcessingTrait;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class MediaRelationManager extends RelationManager
{
    use ImageProcessingTrait;

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

                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->formatStateUsing(fn($state) => Str::title($state))
                    ->searchable(),

                Tables\Columns\TextColumn::make('video_url')
                    ->searchable()
                    ->wrap(),

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
                                        Forms\Components\Select::make('type')
                                            ->label('Media Type')
                                            ->required(fn(Get $get) => in_array($get('type'), ['gallery','hero','showcase','spotlight']))
                                            ->options([
                                                'gallery' => 'Gallery',
                                                'hero' => 'Hero',
                                                'showcase' => 'Showcase ',
                                                'spotlight' => 'Spotlight',
                                            ]),

                                        Forms\Components\TextInput::make('caption')
                                            ->label('Caption (Optional)')
                                            ->placeholder('This caption will be applied to all uploaded images.'),

                                        Forms\Components\FileUpload::make('path')
                                            ->label('Upload Images')
                                            ->multiple()
                                            ->reorderable()
                                            ->image()
                                            ->acceptedFileTypes(['image/jpeg', 'image/png'])
                                            ->rules(['mimes:jpg,jpeg,png']) // সার্ভার-সাইড ভ্যালিডেশন
                                            ->directory('temp-uploads')
                                            ->required(fn(Get $get) => in_array($get('type'), ['gallery','hero','showcase','spotlight']))
                                            ->columnSpanFull(),
                                    ]),

                                Forms\Components\Tabs\Tab::make('Video')
                                    ->columns(2)
                                    ->schema([
//                                        Forms\Components\Hidden::make('type')->default('video'),
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
                    ->using(function (array $data, RelationManager $livewire): Model {
                        $ownerRecord = $livewire->getOwnerRecord();

                        // --- ভিডিও ট্যাব হ্যান্ডেল করুন ---
                        if (!empty($data['video_url'])) {
                            return $livewire->getRelationship()->create([
                                'type' => 'video',
                                'video_url' => $data['video_url'],
                                'caption' => $data['caption'],
                            ]);
                        }

                        // --- ইমেজ ট্যাব হ্যান্ডেল করুন ---
                        // নিশ্চিত করুন যে path কী-টি আছে এবং এটি একটি অ্যারে
                        if (!empty($data['path']) && is_array($data['path'])) {
                            $createdRecords = [];
                            $mediaType = $data['type']; // 'gallery', 'hero', etc.
                            [$width, $height] = $this->getDimensionsForType($mediaType); // Trait থেকে ডাইমেনশন নিন

                            foreach ($data['path'] as $tempPath) {
                                $finalPath = $this->processAndSaveImage(
                                    $tempPath,
                                    "property/{$ownerRecord->property_id}",
                                    $mediaType,
                                    $width,
                                    $height
                                );

                                if ($finalPath) {
                                    $createdRecords[] = $livewire->getRelationship()->create([
                                        'path' => $finalPath,
                                        'type' => $mediaType,
                                        'caption' => $data['caption'],
                                    ]);
                                }
                            }

                            // যদি কমপক্ষে একটি ছবি সফলভাবে সেভ হয়, তাহলে সর্বশেষটি রিটার্ন করুন
                            if (!empty($createdRecords)) {
                                return last($createdRecords);
                            }
                        }

                        // যদি কোনো কিছু কাজ না করে বা কোনো ফাইল আপলোড না হয়,
                        // তাহলে একটি এরর প্রতিরোধকারী ফলব্যাক রিটার্ন করুন।
                        return $livewire->getRelationship()->make($data);
                    })
            ])
            ->actions([
                // EditAction এখন শুধুমাত্র একটি ছবির ক্যাপশন এডিট করতে ব্যবহৃত হবে
                Tables\Actions\EditAction::make()
                    ->modalHeading('Edit'),
                Tables\Actions\DeleteAction::make()

                    ->modalHeading('Delete Record?')
                    ->modalDescription('Are you sure you want to delete the selected record? This action cannot be undone.'),
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
}
