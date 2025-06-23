<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaResource\Pages;
use App\Filament\Resources\MediaResource\RelationManagers;
use App\Models\Media;
use App\Models\Property;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
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
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 7;

//    protected static ?string $navigationParentItem = 'My Properties';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                Group::make()
                    ->columnSpan(2)
                    ->schema([
                        Fieldset::make('Property Selection')
                            ->schema([
                                Select::make('property_id')
                                    ->searchable()
                                    ->preload()
                                    ->relationship('property', 'property_id')
                                    ->columnSpanFull()
                                    ->label('Select Property')
                                    ->required(),
//                                    ->options(fn() => Property::where('is_available', 1)->pluck('title','id')),
                            ]),

                        Fieldset::make('Caption and video link')
                            ->schema([
                                Forms\Components\Select::make('type')
                                    ->label('Image/Video Type')
                                    ->required()
                                    ->helperText('Choose the type of content you want to display. Select "Image" to upload an image, or "Video" to provide a video URL.')
                                    ->options([
                                        'image' => 'Image',
                                        'video_url' => 'Video'
                                    ]),

                                Forms\Components\Textarea::make('caption')
                                    ->label('Common Caption (Optional)')
                                    ->placeholder('This caption will be applied to all uploaded images.'),
                            ]),
                    ]),

                Group::make()
                    ->schema([
                        Fieldset::make('Images / Video')
                            ->schema([
                                Forms\Components\FileUpload::make('path')
                                    ->label('')
                                    ->multiple() // <<-- একাধিক ফাইল আপলোডের জন্য এটি সবচেয়ে গুরুত্বপূর্ণ
                                    ->reorderable() // ব্যবহারকারীকে ছবি সাজানোর সুযোগ দেবে
                                    ->appendFiles() // নতুন ছবি যোগ করার সময় পুরোনো গুলো দেখাবে
                                    ->image()
                                    ->directory('property/gallery')
                                    ->required()
                                    ->downloadable()
                                    ->columnSpanFull(),
                            ]),
                    ]),




            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('property.property_id')
                    ->label('Property ID')
                    ->url(fn(Model $record) => PropertyResource::getUrl('view', ['record' => $record->property]))
                    ->openUrlInNewTab()
                    ->searchable(),

                Tables\Columns\ImageColumn::make('path')
                    ->label('Image')
                    ->width(80)
                    ->extraImgAttributes(['class' => 'rounded-lg']),

                Tables\Columns\TextColumn::make('type')
                    ->formatStateUsing(fn($state) => Str::title($state)),

                Tables\Columns\TextColumn::make('caption')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->formatStateUsing(fn($state) => Carbon::parse($state)->toDayDateTimeString())
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultPaginationPageOption(5)
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
