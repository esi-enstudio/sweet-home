<?php

namespace App\Filament\User\Resources\PropertyResource\Pages;

use App\Filament\User\Resources\PropertyResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;
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
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'pending')->where('user_id', Auth::id())->latest('updated_at'))
                ->badge(function () {
                    return $this->getModel()::where('status', 'pending')->where('user_id', Auth::id())->count();
                }),

            'Rejected' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'rejected')->where('user_id', Auth::id())->latest())
                ->badge(function () {
                    return $this->getModel()::where('status', 'rejected')->where('user_id', Auth::id())->count();
                }),

            'Hero' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('is_hero_featured', 1)->where('status', 'approved')->where('user_id', Auth::id())->latest())
                ->badge(function () {
                    return $this->getModel()::where('is_hero_featured', 1)->where('user_id', Auth::id())->where('status', 'approved')->count();
                }),

            'Spotlight' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('is_spotlight', 1)->where('status', 'approved')->where('user_id', Auth::id())->latest())
                ->badge(function () {
                    return $this->getModel()::where('is_spotlight', 1)->where('status', 'approved')->where('user_id', Auth::id())->count();
                }),

            'Showcase' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('is_featured_showcase', 1)->where('status', 'approved')->where('user_id', Auth::id())->latest())
                ->badge(function () {
                    return $this->getModel()::where('is_featured_showcase', 1)->where('status', 'approved')->where('user_id', Auth::id())->count();
                }),

            'Featured' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('is_featured', 1)->where('status', 'approved')->where('user_id', Auth::id())->latest())
                ->badge(function () {
                    return $this->getModel()::where('is_featured', 1)->where('status', 'approved')->where('user_id', Auth::id())->count();
                }),

            'Regular' => Tab::make()
                ->modifyQueryUsing(function (Builder $query){
                    $query->where('is_featured', '!=', 1)
                        ->where('user_id', Auth::id())
                        ->where('is_hero_featured','!=', 1)
                        ->where('is_spotlight','!=', 1)
                        ->where('is_featured_showcase','!=', 1)
                        ->where('status', 'approved')
                        ->latest();
                })
                ->badge(function () {
                    return $this->getModel()::where('is_featured','!=', 1)
                        ->where('user_id', Auth::id())
                        ->where('is_hero_featured','!=', 1)
                        ->where('is_spotlight','!=', 1)
                        ->where('is_featured_showcase','!=', 1)
                        ->where('status', 'approved')
                        ->count();
                }),
        ];
    }
}
