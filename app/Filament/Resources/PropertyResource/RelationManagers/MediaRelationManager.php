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
                Forms\Components\FileUpload::make('path')
                    ->label('Images')
                    ->multiple() // <<-- একাধিক ফাইল আপলোডের জন্য এটি সবচেয়ে গুরুত্বপূর্ণ
                    ->reorderable() // ব্যবহারকারীকে ছবি সাজানোর সুযোগ দেবে
                    ->appendFiles() // নতুন ছবি যোগ করার সময় পুরোনো গুলো দেখাবে
                    ->image()
                    ->directory('property-gallery')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('caption')
                    ->label('Common Caption (Optional)')
                    ->placeholder('This caption will be applied to all uploaded images.'),
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
                    ->using(function (array $data, RelationManager $livewire): Model {
                        $createdRecords = [];
                        // $data['path'] এখন একটি অ্যারে, তাই আমরা লুপ চালাব
                        foreach ($data['path'] as $filePath) {
                            $createdRecords[] = $livewire->getRelationship()->create([
                                'path' => $filePath,
                                'caption' => $data['caption'], // প্রতিটি ছবির জন্য একই ক্যাপশন ব্যবহার করা হচ্ছে
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
