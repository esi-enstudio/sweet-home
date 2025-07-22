<?php

namespace App\Filament\Resources\OurInspirationResource\Pages;

use App\Filament\Resources\OurInspirationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOurInspirations extends ListRecords
{
    protected static string $resource = OurInspirationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus')
                ->label('Add New'),
        ];
    }
}
