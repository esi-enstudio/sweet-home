<?php

namespace App\Filament\User\Resources\MessageResource\Pages;

use App\Filament\User\Resources\MessageResource;
use App\Models\Property;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

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
        $propertiesId = Property::query()->where('user_id', Auth::id())->pluck('id');

        return [
            'Unread' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->whereIn('property_id', $propertiesId)->where('is_read', false)->latest())
                ->badge(function () use ($propertiesId) {
                    return $this->getModel()::whereIn('property_id', $propertiesId)->where('is_read', 0)->count();
                }),

            'Read' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->whereIn('property_id', $propertiesId)->where('is_read', true)->latest())
                ->badge(function () use ($propertiesId) {
                    return $this->getModel()::whereIn('property_id', $propertiesId)->where('is_read', true)->count();
                }),
        ];
    }
}
