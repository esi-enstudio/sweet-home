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

class MediaRelationManager extends RelationManager
{
    protected static string $relationship = 'media';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('type')
                    ->label('Image/Video Type')
                    ->required()
                    ->options([
                        'image' => 'Image',
                        'video' => 'Video',
                        'showcase' => 'Showcase Image',
                        'spotlight' => 'Spotlight Image',
                    ])
                    ->live(), // এটি প্রয়োজন যাতে শর্তভিত্তিক ইনপুট রিয়েলটাইমে আপডেট হয়

                Forms\Components\TextInput::make('caption')
                    ->label('Common Caption (Optional)')
                    ->placeholder('This caption will be applied to all uploaded images.'),

                Forms\Components\FileUpload::make('path')
                    ->label('Upload Images')
                    ->multiple()
                    ->imageEditor()
                    ->reorderable()
                    ->appendFiles()
                    ->image()
                    ->directory('property/gallery')
                    ->required(fn (callable $get) => $get('type') === 'image')
                    ->visible(fn (callable $get) => $get('type') === 'image')
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('showcase_image_path')
                    ->label('Upload Showcase Image')
                    ->imageEditor()
                    ->image()
                    ->directory('property/gallery/showcase')
                    ->required(fn (callable $get) => $get('type') === 'showcase')
                    ->visible(fn (callable $get) => $get('type') === 'showcase')
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('spotlight_image_path')
                    ->label('Upload Spotlight Image')
                    ->imageEditor()
                    ->image()
                    ->directory('property/gallery/spotlight')
                    ->required(fn (callable $get) => $get('type') === 'spotlight')
                    ->visible(fn (callable $get) => $get('type') === 'spotlight')
                    ->columnSpanFull(),

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
                        $createdRecords = [];

                        // $data['path'] এখন একটি অ্যারে, তাই আমরা লুপ চালাব
                        if ($data['type'] === 'image') {
                            foreach ($data['path'] as $filePath) {
                                $createdRecords[] = $livewire->getRelationship()->create([
                                    'type'      => $data['type'],
                                    'path'      => $filePath,
                                    'caption'   => $data['caption'],
                                ]);
                            }
                        } elseif ($data['type'] === 'showcase') {
                            $createdRecords[] = $livewire->getRelationship()->create([
                                'type'                  => $data['type'],
                                'showcase_image_path'   => $data['showcase_image_path'],
                                'caption'               => $data['caption'],
                            ]);
                        } elseif ($data['type'] === 'spotlight') {
                            $createdRecords[] = $livewire->getRelationship()->create([
                                'type'                  => $data['type'],
                                'spotlight_image_path'  => $data['spotlight_image_path'],
                                'caption'               => $data['caption'],
                            ]);
                        } elseif ($data['type'] === 'video') {
                            $createdRecords[] = $livewire->getRelationship()->create([
                                'type'      => $data['type'],
                                'video_url' => $data['video_url'], // এখানে এটা স্ট্রিং, যেমন ইউটিউব URL
                                'caption'   => $data['caption'],
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
                        Forms\Components\Textarea::make('caption')->label('Image Caption'),

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
}
