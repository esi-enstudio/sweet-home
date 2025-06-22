<?php

namespace App\Filament\Resources\SpaceOverviewResource\Pages;

use App\Filament\Resources\SpaceOverviewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpaceOverview extends EditRecord
{
    protected static string $resource = SpaceOverviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
