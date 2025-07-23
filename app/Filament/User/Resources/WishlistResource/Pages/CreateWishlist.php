<?php

namespace App\Filament\User\Resources\WishlistResource\Pages;

use App\Filament\User\Resources\WishlistResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWishlist extends CreateRecord
{
    protected static string $resource = WishlistResource::class;
}
