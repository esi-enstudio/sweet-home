<?php

namespace App\Livewire\SingleProperty;

use App\Models\Property;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Computed;
use Livewire\Component;

class PopularPropertiesWidget extends Component
{

    /**
     * জনপ্রিয় প্রপার্টিগুলো লোড করে, ভিউ সংখ্যা অনুযায়ী।
     */
    #[Computed(seconds: 10800, cache: true, key: 'popular-properties-widget')]
    public function popularProperties(): Collection
    {
        return Property::query()
            ->select('id', 'title', 'slug', 'thumbnail', 'address', 'rent_amount', 'bedrooms', 'bathrooms', 'total_area', 'user_id')
            ->with(['user:id,avatar_url'])
            ->where('is_available', true)
            ->where('status', 'approved')
            ->orderByDesc('views_count') // ভিউ সংখ্যা অনুযায়ী সাজানো
            ->take(6) // স্লাইডারের জন্য ৬টি প্রপার্টি
            ->get();
    }
    public function render(): Factory|View|Application
    {
        return view('livewire.single-property.popular-properties-widget');
    }
}
