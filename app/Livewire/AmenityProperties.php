<?php

namespace App\Livewire;

use App\Models\Amenity;
use Illuminate\Contracts\Pagination\CursorPaginator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class AmenityProperties extends Component
{
    use WithPagination;

    public Amenity $amenity; // Route Model Binding থেকে স্বয়ংক্রিয়ভাবে আসবে

    // --- নতুন প্রোপার্টি: কুয়েরি সম্পাদনের সময় ধরে রাখার জন্য ---
    public float $queryTime = 0;

    #[Computed]
    public function properties(): CursorPaginator
    {
        // কুয়েরি শুরু হওয়ার সময় রেকর্ড করুন
        $startTime = microtime(true);

        // $this->amenity->properties() রিলেশনশিপ ব্যবহার করে কুয়েরি চালানো হচ্ছে
        $properties = $this->amenity->properties()
            ->select([
                'properties.id',
                'properties.user_id',
                'properties.thumbnail',
                'properties.listing_type',
                'properties.rent_amount',
                'properties.address',
                'properties.title',
                'properties.slug',
                'properties.bedrooms',
                'properties.bathrooms',
                'properties.total_area',
                'properties.created_at' // properties.created_at
            ])
            ->with(['user'])
            ->where('is_available', 1)
            ->where('status', 'approved')
            ->orderBy('properties.created_at', 'desc')
            ->orderBy('properties.id', 'desc') // ভালো অভ্যাস হিসেবে এখানেও টেবিলের নাম দিন
            ->cursorPaginate(5);

        // কুয়েরি শেষ হওয়ার সময় রেকর্ড করুন এবং পার্থক্য গণনা করুন
        $endTime = microtime(true);
        $this->queryTime = $endTime - $startTime;

        return $properties;
    }

    /**
     * মোট ফলাফলের সংখ্যা গণনা এবং ক্যাশে করার জন্য একটি নতুন computed property।
     */
    #[Computed(persist: true, seconds: 300)] // ৫ মিনিটের জন্য ক্যাশে থাকবে
    public function totalResults(): int
    {
        // এই কুয়েরিটি শুধুমাত্র ফলাফলের সংখ্যা গণনা করবে
        return $this->amenity->properties()
            ->where('is_available', 1)
            ->where('status', 'approved')
            ->count();
    }


    public function render(): Factory|View|Application
    {
        return view('livewire.amenity-properties')
            ->title('Properties with ' .' :: '. $this->amenity->name);
    }
}
