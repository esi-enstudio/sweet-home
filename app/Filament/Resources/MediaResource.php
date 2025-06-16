<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaResource\Pages;
use App\Filament\Resources\MediaResource\RelationManagers;
use App\Models\Media;
use App\Models\Property;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationParentItem = 'My Properties';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                Group::make()
                    ->columnSpan(2)
                    ->schema([
                        Section::make('Property Selection')
                            ->description('Choose the property to which the media (images or videos) will be associated.')
                            ->schema([
                                Select::make('property_id')
                                    ->label('Select Property')
                                    ->required()
                                    ->options(fn() => Property::where('is_available', 1)->pluck('title','id')),
                            ]),

                        Section::make('Caption and video link')
                            ->description('Add a short caption for better understanding.')
                            ->schema([
                                TextInput::make('caption')
//                                    ->label('ক্যাপশন')
                                    ->helperText('ছবির বা ভিডিওর জন্য একটি সংক্ষিপ্ত বর্ণনা দিন'),

                                TextInput::make('video_url')
//                                    ->label('ভিডিও লিংক')
                                    ->helperText('ভিডিওটি ইউটিউব এ আপলোড করে লিংক টি এখানে দিন।'),
                            ]),
                    ]),

                Group::make()
                    ->columnSpan(1)
                    ->schema([
                        Section::make('Thumbnail')
                            ->description('A small preview image representing the property visually in listings and overviews.')
                            ->schema([
                                FileUpload::make('thumbnail')
//                                    ->label('ছবি আপলোড')
                                    ->required()
                                    ->disk('public')
                                    ->directory('properties/thumbnails')
                                    ->helperText('থাম্বনেইল আপলোড করুন'),
                            ]),

                        Section::make('Gallery')
                            ->description('Add photos to visually represent the property.')
                            ->schema([
                                FileUpload::make('gallery')
//                                    ->label('ছবি আপলোড')
                                    ->multiple()
                                    ->required()
                                    ->disk('public')
                                    ->directory('properties/gallery')
                                    ->helperText('ছবিগুলো এখানে আপলোড করুন'),
                            ]),
                    ]),




            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('property_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('media_type'),
                Tables\Columns\TextColumn::make('file_path')
                    ->searchable(),
                Tables\Columns\TextColumn::make('caption')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMedia::route('/'),
            'create' => Pages\CreateMedia::route('/create'),
            'edit' => Pages\EditMedia::route('/{record}/edit'),
        ];
    }
}
