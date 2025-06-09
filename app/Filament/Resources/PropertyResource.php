<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Filament\Resources\PropertyResource\RelationManagers;
use App\Models\Property;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Property Details')
                        ->columns(2)
                        ->schema([
                            Section::make('Primary Information')
                                ->columns(2)
                                ->schema([
                                    TextInput::make('title')
                                        ->required()
                                        ->maxLength(255),

                                    TextInput::make('address')
                                        ->required()
                                        ->maxLength(255),

                                    TextInput::make('landmark')
                                        ->maxLength(255),

                                    TextInput::make('environment')
                                        ->maxLength(255),
                                ]),

                            Section::make('Google Maps Data')
                                ->columns(2)
                                ->schema([
                                    TextInput::make('latitude')
                                        ->numeric(),

                                    TextInput::make('longitude')
                                        ->numeric(),
                                ]),

                            Section::make('Property Specifications')
                                ->columns(2)
                                ->schema([
                                    Select::make('area_type')
                                        ->options([
                                            'urban' => 'Urban',
                                            'semi_urban' => 'Semi Urban',
                                            'rural' => 'Rural',
                                        ]),

                                    Select::make('property_type')
                                        ->options([
                                            'tin_shed' => 'Tin Shed',
                                            'semi_pucca' => 'Semi Pucca',
                                            'flat' => 'Flat',
                                            'duplex' => 'Duplex',
                                        ]),

                                    Select::make('tenant_type')
                                        ->options([
                                            'small_family' => 'Small Family',
                                            'large_family' => 'Large Family',
                                            'bachelor' => 'Bachelor',
                                            'sublet' => 'Sublet',
                                        ]),

                                    TextInput::make('total_area')
                                        ->numeric(),
                                ]),

                            Section::make('Rooms & Spaces')
                                ->columns(2)
                                ->schema([
                                    TextInput::make('bedrooms')
                                        ->numeric(),

                                    TextInput::make('bathrooms')
                                        ->numeric(),

                                    TextInput::make('dining_rooms')
                                        ->numeric(),

                                    TextInput::make('living_rooms')
                                        ->numeric(),

                                    TextInput::make('study_rooms')
                                        ->numeric(),

                                    TextInput::make('store_rooms')
                                        ->numeric(),

                                    TextInput::make('balconies')
                                        ->numeric(),
                                ]),

                            Section::make('Finishing & Condition')
                                ->columns(2)
                                ->schema([
                                    Select::make('floor_number')
                                        ->multiple()
                                        ->preload()
                                        ->options([
                                            'ground' => 'Ground Floor',
                                            '1st' => '1st Floor',
                                            '2nd' => '2nd Floor',
                                            '3rd' => '3rd Floor',
                                            '4th' => '4th Floor',
                                            '5th' => '5th Floor',
                                            '6th' => '6th Floor',
                                            '7th' => '7th Floor',
                                            '8th' => '8th Floor',
                                            '9th' => '9th Floor',
                                            '10th' => '10th Floor',
                                            '11th' => '11th Floor',
                                            '12th' => '12th Floor',
                                            '13th' => '13th Floor',
                                            '14th' => '14th Floor',
                                            '15th' => '15th Floor',
                                            '16th' => '16th Floor',
                                            '17th' => '17th Floor',
                                            '18th' => '18th Floor',
                                            '19th' => '19th Floor',
                                            '20th' => '20th Floor',
                                        ]),

                                    Select::make('flooring')
                                        ->options([
                                            'tiles' => 'Tiles',
                                            'marble' => 'Marble',
                                            'wood' => 'Wood',
                                            'cement' => 'Cement',
                                        ]),

                                    Select::make('walls')
                                        ->options([
                                            'plaster' => 'Plaster',
                                            'paint' => 'Paint',
                                            'wallpaper' => 'Wallpaper',
                                        ]),

                                    Select::make('windows')
                                        ->options([
                                            'aluminum' => 'Aluminum',
                                            'glass' => 'Glass',
                                            'wood' => 'Wood',
                                            'iron' => 'Iron',
                                        ]),

                                    Select::make('condition')
                                        ->options([
                                            'new' => 'New',
                                            'old' => 'Old',
                                        ]),

                                    Select::make('facing')
                                        ->options([
                                            'north' => 'North',
                                            'south' => 'South',
                                            'east' => 'East',
                                            'west' => 'West',
                                        ]),
                                ]),


                            DatePicker::make('available_from')
                                ->native(false),

                            Select::make('is_urgent')
                                ->options([
                                    'true' => 'Yes',
                                    'false' => 'No',
                                ]),

                            Select::make('listing_type')
                                ->options([
                                    'rent' => 'Rent',
                                    'buy' => 'Buy',
                                    'sell' => 'Sell',
                                ]),

                            FileUpload::make('floor_plan')
                                ->disk('public')
                                ->directory('properties/floor-plan'),
                        ]),

                    Wizard\Step::make('Amenities')
                        ->columns(2)
                        ->schema([
                            TagsInput::make('nearby_facilities'),
                            TagsInput::make('natural_environments'),
                        ]),

                    Wizard\Step::make('Rent & Costs')
                        ->schema([
                            TextInput::make('monthly_rent')
                                ->numeric(),
                            TextInput::make('rent_includes')
                                ->maxLength(255)
                                ->helperText('e.g., ইউটিলিটি বিল, সার্ভিস চার্জ'),
                        ]),

                    Wizard\Step::make('Rental Terms')
                        ->schema([
                            Forms\Components\TextInput::make('contract_duration')
                                ->maxLength(255)
                                ->helperText('e.g., 1 Year, 6 Months'),
                            Forms\Components\Textarea::make('contract_breach_terms')
                                ->maxLength(65535),
                        ]),

                    Wizard\Step::make('Contact Details')
                        ->schema([
                            Forms\Components\TextInput::make('contract_duration')
                                ->maxLength(255)
                                ->helperText('e.g., 1 Year, 6 Months'),
                            Forms\Components\Textarea::make('contract_breach_terms')
                                ->maxLength(65535),
                        ]),

                    Wizard\Step::make('Media')
                        ->schema([
                            Forms\Components\TextInput::make('contract_duration')
                                ->maxLength(255)
                                ->helperText('e.g., 1 Year, 6 Months'),
                            Forms\Components\Textarea::make('contract_breach_terms')
                                ->maxLength(65535),
                        ]),
                ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('landmark')
                    ->searchable(),
                Tables\Columns\TextColumn::make('latitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('longitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('area_type'),
                Tables\Columns\TextColumn::make('property_type'),
                Tables\Columns\TextColumn::make('tenant_type'),
                Tables\Columns\TextColumn::make('total_area')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bedrooms')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bathrooms')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dining_rooms')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('living_rooms')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('study_rooms')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('store_rooms')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('balconies')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('floor_plan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('floor_number')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('flooring'),
                Tables\Columns\TextColumn::make('walls'),
                Tables\Columns\TextColumn::make('windows'),
                Tables\Columns\TextColumn::make('condition'),
                Tables\Columns\TextColumn::make('facing'),
                Tables\Columns\TextColumn::make('available_from')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('views_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_urgent')
                    ->boolean(),
                Tables\Columns\TextColumn::make('listing_type'),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }
}
