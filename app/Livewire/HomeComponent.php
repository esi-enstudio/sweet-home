<?php

namespace App\Livewire;

use App\Models\Amenity;
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
            'media',
            'amenities' => function($query){
                $query->wherePivot('is_key_feature', true)->take(4);
            },
        ])
            ->where('is_featured_showcase', true)
            ->where('is_available', true)
            ->where('status', 'approved')
            ->first();
    }


    /**
     * "Featured Listings" সেকশনের জন্য প্রপার্টি লোড করে।
     * is_featured = true
     * সাথে ছবি ও ভিডিওর সংখ্যা গণনা করে।
     */
    #[Computed(seconds: 15, cache: true, key: 'featured-listings')]
    public function featuredListings(): Collection
    {
        return Property::select([
                'user_id','listing_type','thumbnail','address','rent_amount','title','slug','description','bedrooms','bathrooms','total_area'
            ])
            ->withCount([
                // 'images' নামে একটি নতুন অ্যাট্রিবিউট যোগ হবে
                'media as images_count' => function($query){
                    // media টেবিলের type কলাম 'image' হলে গণনা কর
                    $query->where('type','image');
                },

                // 'videos' নামে একটি নতুন অ্যাট্রিবিউট যোগ হবে
                'media as videos_count' => function($query){
                    $query->where('type','video');
                },
            ])
            ->with(['user'])
            ->where('is_featured', 1)
            ->where('is_available', 1)
            ->where('status', 'approved')
            ->latest()
            ->take(10)
            ->get();
    }

    #[Computed(seconds: 20, cache: true, key: 'amenity-cards')]
    public function buildingAmenities(): Collection
    {
        return Amenity::where('show_on_homepage', true)
            ->take(8)
            ->get();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.home-component');
    }
}
