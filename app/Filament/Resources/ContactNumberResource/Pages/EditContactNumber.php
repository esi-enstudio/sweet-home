<?php

namespace App\Filament\Resources\ContactNumberResource\Pages;

use App\Filament\Resources\ContactNumberResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactNumber extends EditRecord
{
    protected static string $resource = ContactNumberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
