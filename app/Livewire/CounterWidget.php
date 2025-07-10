<?php

namespace App\Livewire;

use App\Models\Property;
use App\Models\PropertyType;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Computed;
use Livewire\Component;

class CounterWidget extends Component
{
    /**
     * কাউন্টারগুলোর জন্য ডেটা গণনা করে এবং ক্যাশে রাখে।
     */
    #[Computed(seconds: 86400, cache: true, key: 'homepage-counters')] // ২৪ ঘণ্টা ক্যাশে থাকবে
    public function stats(): array
    {
        return [
            'available_listings' => Property::where('status', 'approved')->count(),
            'rental_properties' => Property::where('listing_type', 'rent')->where('status', 'approved')->count(),
            'users' => User::count(), // আপনি চাইলে একটি বেস নাম্বার যোগ করতে পারেন
            'property_types' => PropertyType::count(),
        ];
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.counter-widget');
    }
}
