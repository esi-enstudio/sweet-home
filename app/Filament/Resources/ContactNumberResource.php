<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactNumberResource\Pages;
use App\Filament\Resources\ContactNumberResource\RelationManagers;
use App\Models\ContactNumber;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactNumberResource extends Resource
{
    protected static ?string $model = ContactNumber::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationParentItem = 'Properties';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('property_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('alternate_number')
                    ->maxLength(255),
                Forms\Components\TextInput::make('whatsapp_number')
                    ->maxLength(255),
                Forms\Components\TextInput::make('imo_number')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('property_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alternate_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('imo_number')
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
            'index' => Pages\ListContactNumbers::route('/'),
            'create' => Pages\CreateContactNumber::route('/create'),
            'edit' => Pages\EditContactNumber::route('/{record}/edit'),
        ];
    }
}
