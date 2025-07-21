<?php

namespace App\Filament\Resources\OurInspirationResource\Pages;

use App\Filament\Resources\OurInspirationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOurInspiration extends EditRecord
{
    protected static string $resource = OurInspirationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
