<?php

namespace App\Filament\Resources\MessageResource\Pages;

use App\Filament\Resources\MessageResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMessage extends ViewRecord
{
    protected static string $resource = MessageResource::class;

    // আপনি চাইলে এখানে EditAction বাটনও যোগ করতে পারেন
    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\EditAction::make(),
        ];
    }
}
