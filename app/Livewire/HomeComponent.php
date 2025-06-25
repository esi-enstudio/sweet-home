<?php

namespace App\Livewire;

use App\Models\Property;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class HomeComponent extends Component
{
    #[Computed(cache: true, key: 'hero-properties')]
    public function heroProperties(): Collection
    {
        return Property::with('user','propertyType','media') // SEO-এর জন্য প্রয়োজনীয় রিলেশন
            ->where('is_hero_featured', true)
            ->where('is_available', true)
            ->orderBy('hero_order_column', 'asc')
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.home-component');
    }
}
