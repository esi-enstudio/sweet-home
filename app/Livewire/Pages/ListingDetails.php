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
    public ?Property $property; // টাইপটিকে nullable (?) করুন

    // রাউট মডেল বাইন্ডিং ব্যবহার করে স্বয়ংক্রিয়ভাবে $property লোড হবে
    public function mount(Property $property): void
    {
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
