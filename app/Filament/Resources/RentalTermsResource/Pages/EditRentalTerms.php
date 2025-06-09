<?php

namespace App\Filament\Resources\RentalTermsResource\Pages;

use App\Filament\Resources\RentalTermsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRentalTerms extends EditRecord
{
    protected static string $resource = RentalTermsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
