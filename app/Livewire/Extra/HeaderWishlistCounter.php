<?php

namespace App\Livewire\Extra;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class HeaderWishlistCounter extends Component
{
    public int $wishlistCount = 0;

    /**
     * কম্পোনেন্টটি মাউন্ট হওয়ার সময় প্রাথমিক কাউন্টটি লোড করে।
     */
    public function mount(): void
    {
        $this->updateCount();
    }

    /**
     * 'wishlist-updated' ইভেন্টটি শুনবে এবং updateCount() মেথডকে কল করবে।
     */
    #[On('wishlist-updated')]
    public function updateCount(): void
    {
        if (Auth::check()) {
            // লগইন করা ইউজারের wishlist-এর সংখ্যা গণনা করুন
            $this->wishlistCount = Auth::user()->wishlistedProperties()->count();
        } else {
            $this->wishlistCount = 0;
        }
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.extra.header-wishlist-counter');
    }
}
