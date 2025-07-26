<?php

namespace App\Filament\User\Resources\TagResource\Pages;

use App\Filament\User\Resources\TagResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTag extends CreateRecord
{
    protected static string $resource = TagResource::class;
}
