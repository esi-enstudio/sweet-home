<?php

namespace App\Livewire;

use App\Models\Property;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class HomeComponent extends Component
{
//    public $property;
//
//    public function mount(Property $property): void
//    {
//        $this->property = $property;
//    }
    public function render(): Factory|View|Application
    {
        return view('livewire.home-component', [
            'properties' => Property::with('user','amenity','media','rentAndAdditionalCost')->get(),
        ]);
    }
}
