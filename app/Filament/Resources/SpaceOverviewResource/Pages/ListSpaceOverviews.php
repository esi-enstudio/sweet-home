<?php

namespace App\Filament\Resources\SpaceOverviewResource\Pages;

use App\Filament\Resources\SpaceOverviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpaceOverviews extends ListRecords
{
    protected static string $resource = SpaceOverviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
