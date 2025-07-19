<?php

namespace App\Filament\Resources\MessageResource\Pages;

use App\Filament\Resources\MessageResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListMessages extends ListRecords
{
    protected static string $resource = MessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Unread' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('is_read', false)->latest())
                ->badge(function () {
                    return $this->getModel()::where('is_read', false)->count();
                }),

            'Read' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('is_read', true)->latest())
                ->badge(function () {
                    return $this->getModel()::where('is_read', true)->count();
                }),
        ];
    }
}
