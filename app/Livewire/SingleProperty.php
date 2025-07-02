<?php

namespace App\Livewire;

use App\Models\Property;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class SingleProperty extends Component
{
    public Property $property;

    public function mount(Property $property): void
    {
        // View পেজের জন্য প্রয়োজনীয় সব রিলেশনশিপ ইগার লোড করুন
        $this->property = $property->load([
            'user',
            'propertyType',
            'tenants', // Many-to-Many
            'media',
            'amenities',
            'spaceOverviews',
            'floorPlans',
            'reviews.user' // রিভিউ এবং রিভিউয়ারের তথ্য
        ]);
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.single-property')
            ->title('Property Details' .' :: '. config('app.name'));
    }
}
