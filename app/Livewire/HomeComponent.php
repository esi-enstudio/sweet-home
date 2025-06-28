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
    /**
     * হিরো সেকশনের জন্য ফিচার্ড প্রপার্টিগুলো লোড করে।
     * is_hero_featured = true
     */
    #[Computed(seconds: 5, cache: true, key: 'hero-properties')]
    public function heroProperties(): Collection
    {
        return Property::with('user','propertyType','media') // SEO-এর জন্য প্রয়োজনীয় রিলেশন
            ->where('is_hero_featured', true)
            ->where('is_available', true)
            ->where('status', 'approved')
            ->orderBy('hero_order_column', 'asc')
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();
    }

    /**
     * "Spotlight Property" সেকশনের জন্য প্রপার্টি লোড করে।
     * is_spotlight = true
     */
    #[Computed(seconds: 5, cache: true, key: 'spotlight-property')]
    public function spotlightProperty(): ?Property
    {
        return Property::with([
            'media',
            'amenities' => function($query){
                $query->wherePivot('is_key_feature', true)->take(4);
            },
        ])
            ->where('is_spotlight', true)
            ->where('is_available', true)
            ->where('status', 'approved')
            ->first();
    }


    /**
     * "Featured Showcase Property" সেকশনের জন্য প্রপার্টি লোড করে।
     * is_featured_showcase = true
     */
    #[Computed(seconds: 5, cache: true, key: 'showcase-property')]
    public function showcaseProperty(): ?Property
    {
        return Property::with([
            'media' => function($query){
                $query->where('type','image')->take(3);
            },

            'amenities' => function($query){
                $query->wherePivot('is_key_feature', true)->take(4);
            },
        ])
            ->where('is_featured_showcase', true)
            ->where('is_available', true)
            ->where('status', 'approved')
            ->first();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.home-component');
    }
}
