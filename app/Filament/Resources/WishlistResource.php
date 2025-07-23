<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WishlistResource\Pages;
use App\Filament\Resources\WishlistResource\RelationManagers;
use App\Filament\User\Resources\PropertyResource;
use App\Models\Wishlist;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WishlistResource extends Resource
{
    protected static ?string $model = Wishlist::class;
    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?string $navigationLabel = 'My Wishlist';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('property.thumbnail'),
                Tables\Columns\TextColumn::make('property.title')->searchable(),
                Tables\Columns\TextColumn::make('property.rent_amount')->money('BDT'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('view_property')
                    ->url(fn (Wishlist $record) => PropertyResource::getUrl('view', ['record' => $record->property]))
                    ->icon('heroicon-o-eye'),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListWishlists::route('/'),
//            'create' => Pages\CreateWishlist::route('/create'),
//            'edit' => Pages\EditWishlist::route('/{record}/edit'),
        ];
    }
}
