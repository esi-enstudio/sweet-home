<?php

namespace App\Filament\Resources\RentalTermsResource\Pages;

use App\Filament\Resources\RentalTermsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRentalTerms extends ListRecords
{
    protected static string $resource = RentalTermsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
