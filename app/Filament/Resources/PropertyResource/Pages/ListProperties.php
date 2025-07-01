<?php

namespace App\Filament\Resources\PropertyResource\Pages;

use App\Filament\Resources\PropertyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListProperties extends ListRecords
{
    protected static string $resource = PropertyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus')
                ->label('Add New'),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Pending' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'pending')->latest('updated_at'))
                ->badge(function () {
                    return $this->getModel()::where('status', 'pending')->count();
                }),

            'Rejected' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'rejected')->latest())
                ->badge(function () {
                    return $this->getModel()::where('status', 'rejected')->count();
                }),

            'Hero' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('is_hero_featured', 1)->where('status', 'approved')->latest())
                ->badge(function () {
                    return $this->getModel()::where('is_hero_featured', 1)->where('status', 'approved')->count();
                }),

            'Spotlight' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('is_spotlight', 1)->where('status', 'approved')->latest())
                ->badge(function () {
                    return $this->getModel()::where('is_spotlight', 1)->where('status', 'approved')->count();
                }),

            'Showcase' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('is_featured_showcase', 1)->where('status', 'approved')->latest())
                ->badge(function () {
                    return $this->getModel()::where('is_featured_showcase', 1)->where('status', 'approved')->count();
                }),

            'Featured' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('is_featured', 1)->where('status', 'approved')->latest())
                ->badge(function () {
                    return $this->getModel()::where('is_featured', 1)->where('status', 'approved')->count();
                }),

            'Others' => Tab::make()
                ->modifyQueryUsing(function (Builder $query){
                    $query->where('is_featured', '!=', 1)
                        ->where('is_hero_featured','!=', 1)
                        ->where('is_spotlight','!=', 1)
                        ->where('is_featured_showcase','!=', 1)
                        ->where('status', 'approved')
                        ->latest();
                })
                ->badge(function () {
                    return $this->getModel()::where('is_featured','!=', 1)
                        ->where('is_hero_featured','!=', 1)
                        ->where('is_spotlight','!=', 1)
                        ->where('is_featured_showcase','!=', 1)
                        ->where('status', 'approved')
                        ->count();
                }),
        ];
    }
}
