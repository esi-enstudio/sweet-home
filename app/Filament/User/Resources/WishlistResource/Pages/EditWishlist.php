<?php

namespace App\Filament\User\Resources\WishlistResource\Pages;

use App\Filament\User\Resources\WishlistResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWishlist extends EditRecord
{
    protected static string $resource = WishlistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
