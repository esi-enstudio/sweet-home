<?php

namespace App\Filament\User\Resources\PostCategoryResource\Pages;

use App\Filament\User\Resources\PostCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePostCategory extends CreateRecord
{
    protected static string $resource = PostCategoryResource::class;
}
