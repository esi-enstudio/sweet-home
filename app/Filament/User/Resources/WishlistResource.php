<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\WishlistResource\Pages;
use App\Filament\User\Resources\WishlistResource\RelationManagers;
use App\Models\Wishlist;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class WishlistResource extends Resource
{
    protected static ?string $model = Wishlist::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?string $navigationLabel = 'My Wishlist';

    protected static ?int $navigationSort = 4;


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
                Tables\Columns\TextColumn::make('property.rent_amount')->label('Price')->money('BDT'),
            ])
            ->defaultPaginationPageOption(5)
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('view_property')
                    ->url(function (Wishlist $record): string {
                        // যদি কোনো কারণে property রিলেশনটি null হয়
                        if (!$record->property) {
                            // একটি নিরাপদ ফলব্যাক URL রিটার্ন করুন
                            return '#';
                        }
                        // অন্যথায়, সঠিক URL তৈরি করুন
                        return PropertyResource::getUrl('view', ['record' => $record->property]);
                    })
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

    // শুধুমাত্র বর্তমান ইউজারের wishlist দেখানো হবে
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with('property')
            ->where('user_id', Auth::id());
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('user_id', Auth::id())->count();
    }
}
