<?php

namespace App\Livewire\Pages;

use App\Models\Property;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ListingDetails extends Component
{
    public Property $property;
    // রাউট মডেল বাইন্ডিং ব্যবহার করে স্বয়ংক্রিয়ভাবে $property লোড হবে
    public function mount(Property $property): void
    {
        // রাউট মডেল বাইন্ডিংয়ের মাধ্যমে $property মডেলটি এখানে চলে এসেছে।
        // এখন load() মেথড ব্যবহার করে এর রিলেশনগুলো লোড করুন।
//        $property->load(['user','amenity','rentAndAdditionalCost','rentalTerms','contactNumber','media','location']);

        // এখন $property অবজেক্টের মধ্যে রিলেশনগুলোও লোড হয়ে গেছে।
        $this->property = $property;
    }


    public function render(): Factory|View|Application
    {
        // যদি প্রপার্টি খুঁজে না পাওয়া যায়, তাহলে 404 পেজ দেখাবে
//        if (!$this->property) {
//            abort(404);
//        }

        return view('livewire.pages.listing-details');
    }
}
