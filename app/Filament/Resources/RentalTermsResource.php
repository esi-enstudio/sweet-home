<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RentalTermsResource\Pages;
use App\Filament\Resources\RentalTermsResource\RelationManagers;
use App\Models\RentalTerms;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RentalTermsResource extends Resource
{
    protected static ?string $model = RentalTerms::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationParentItem = 'Properties';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('property_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('contract_duration')
                    ->maxLength(255),
                Forms\Components\TextInput::make('contract_breach_terms')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tenant_eligibility')
                    ->maxLength(255),
                Forms\Components\TextInput::make('identity_verification')
                    ->maxLength(255),
                Forms\Components\TextInput::make('background_check')
                    ->maxLength(255),
                Forms\Components\TextInput::make('payment_schedule')
                    ->maxLength(255),
                Forms\Components\TextInput::make('payment_methods'),
                Forms\Components\Textarea::make('house_usage_rules')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('maintenance_responsibility')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('damage_liability')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('property_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contract_duration')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contract_breach_terms')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tenant_eligibility')
                    ->searchable(),
                Tables\Columns\TextColumn::make('identity_verification')
                    ->searchable(),
                Tables\Columns\TextColumn::make('background_check')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_schedule')
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
            'index' => Pages\ListRentalTerms::route('/'),
            'create' => Pages\CreateRentalTerms::route('/create'),
            'edit' => Pages\EditRentalTerms::route('/{record}/edit'),
        ];
    }
}
