<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AmenityResource\Pages;
use App\Filament\Resources\AmenityResource\RelationManagers;
use App\Models\Amenity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AmenityResource extends Resource
{
    protected static ?string $model = Amenity::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

//    protected static ?string $navigationLabel = 'সুবিধা ও বৈশিষ্ট্য';

    protected static ?string $navigationParentItem = 'Properties';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('property_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('nearby_facilities'),
                Forms\Components\TextInput::make('natural_environments'),
                Forms\Components\TextInput::make('gas_connection'),
                Forms\Components\TextInput::make('kitchen_type'),
                Forms\Components\Toggle::make('has_lift')
                    ->required(),
                Forms\Components\TextInput::make('water_quality')
                    ->maxLength(255),
                Forms\Components\TextInput::make('water_tank')
                    ->maxLength(255),
                Forms\Components\TextInput::make('electricity_type'),
                Forms\Components\TextInput::make('backup_power')
                    ->maxLength(255),
                Forms\Components\Toggle::make('has_cctv')
                    ->required(),
                Forms\Components\Toggle::make('has_security_guard')
                    ->required(),
                Forms\Components\Toggle::make('has_parking')
                    ->required(),
                Forms\Components\Toggle::make('has_roof_access')
                    ->required(),
                Forms\Components\Toggle::make('pets_allowed')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('property_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gas_connection'),
                Tables\Columns\TextColumn::make('kitchen_type'),
                Tables\Columns\IconColumn::make('has_lift')
                    ->boolean(),
                Tables\Columns\TextColumn::make('water_quality')
                    ->searchable(),
                Tables\Columns\TextColumn::make('water_tank')
                    ->searchable(),
                Tables\Columns\TextColumn::make('electricity_type'),
                Tables\Columns\TextColumn::make('backup_power')
                    ->searchable(),
                Tables\Columns\IconColumn::make('has_cctv')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_security_guard')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_parking')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_roof_access')
                    ->boolean(),
                Tables\Columns\IconColumn::make('pets_allowed')
                    ->boolean(),
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
            'index' => Pages\ListAmenities::route('/'),
            'create' => Pages\CreateAmenity::route('/create'),
            'edit' => Pages\EditAmenity::route('/{record}/edit'),
        ];
    }
}
