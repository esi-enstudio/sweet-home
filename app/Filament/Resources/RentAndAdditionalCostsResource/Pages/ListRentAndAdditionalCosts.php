<?php

namespace App\Filament\Resources\RentAndAdditionalCostsResource\Pages;

use App\Filament\Resources\RentAndAdditionalCostsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRentAndAdditionalCosts extends ListRecords
{
    protected static string $resource = RentAndAdditionalCostsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
