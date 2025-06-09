<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RentAndAdditionalCostsResource\Pages;
use App\Filament\Resources\RentAndAdditionalCostsResource\RelationManagers;
use App\Models\RentAndAdditionalCosts;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RentAndAdditionalCostsResource extends Resource
{
    protected static ?string $model = RentAndAdditionalCosts::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Rent & Costs';

    protected static ?string $navigationParentItem = 'Properties';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('property_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('monthly_rent')
                    ->numeric(),
                Forms\Components\TextInput::make('rent_includes')
                    ->maxLength(255),
                Forms\Components\TextInput::make('rent_increase_possibility')
                    ->maxLength(255),
                Forms\Components\TextInput::make('is_negotiable')
                    ->required(),
                Forms\Components\TextInput::make('water_bill')
                    ->numeric(),
                Forms\Components\TextInput::make('gas_bill')
                    ->numeric(),
                Forms\Components\TextInput::make('electricity_bill')
                    ->numeric(),
                Forms\Components\TextInput::make('service_charge')
                    ->numeric(),
                Forms\Components\TextInput::make('lift_charge')
                    ->numeric(),
                Forms\Components\TextInput::make('generator_charge')
                    ->numeric(),
                Forms\Components\TextInput::make('parking_fee')
                    ->numeric(),
                Forms\Components\TextInput::make('advance_rent_months')
                    ->numeric(),
                Forms\Components\TextInput::make('advance_payment_terms'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('property_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('monthly_rent')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rent_includes')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rent_increase_possibility')
                    ->searchable(),
                Tables\Columns\TextColumn::make('is_negotiable'),
                Tables\Columns\TextColumn::make('water_bill')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gas_bill')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('electricity_bill')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('service_charge')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lift_charge')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('generator_charge')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('parking_fee')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('advance_rent_months')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('advance_payment_terms'),
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
            'index' => Pages\ListRentAndAdditionalCosts::route('/'),
            'create' => Pages\CreateRentAndAdditionalCosts::route('/create'),
            'edit' => Pages\EditRentAndAdditionalCosts::route('/{record}/edit'),
        ];
    }
}
