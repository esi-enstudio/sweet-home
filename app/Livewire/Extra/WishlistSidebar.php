<?php

namespace App\Livewire\Extra;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class WishlistSidebar extends Component
{
    #[Computed]
    public function wishlist(): \Illuminate\Support\Collection
    {
        // নিশ্চিত করুন যে ব্যবহারকারী লগইন করা আছে
        if (!Auth::check()) {
//            return collect(); // খালি কালেকশন রিটার্ন করুন
            return $this->redirect(route('filament.user.auth.login'));
        }

        return Auth::user()->wishlists() // User মডেলের রিলেশন ব্যবহার করা ভালো
        ->with('property') // প্রপার্টি এবং তার মিডিয়া (থাম্বনেইল) লোড করুন
        ->latest() // নতুনগুলো আগে দেখান
        ->get();
    }

    /**
     * 'wishlist-updated' ইভেন্টটি শুনবে।
     * যখন ইভেন্টটি আসবে, তখন এটি wishlist computed property-কে "forget" বা আনসেট করে দেবে।
     */
    #[On('wishlist-updated')]
    public function refreshWishlist(): void
    {
        // computed property আনসেট করুন, যাতে পরের রেন্ডারে এটি নতুন করে গণনা হয়
        unset($this->wishlist);
    }

    /**
     * Wishlist থেকে একটি নির্দিষ্ট আইটেম ডিলিট করে।
     *
     * @param int $wishlistId Wishlist টেবিলের id
     */
    public function removeFromWishlist(int $wishlistId)
    {
        // নিশ্চিত করুন যে ব্যবহারকারী লগইন করা আছে
        if (!Auth::check()) {
            return $this->redirect(route('filament.user.auth.login'));
        }

        // ব্যবহারকারীর নিজের wishlist আইটেমটিই খুঁজুন এবং ডিলিট করুন (নিরাপত্তার জন্য)
        $wishlistItem = Auth::user()->wishlists()->find($wishlistId);

        if ($wishlistItem) {
            $wishlistItem->delete();

            // --- UI আপডেট করার জন্য ---

            // ১. এই কম্পোনেন্টের তালিকাটি রিফ্রেশ করুন
            unset($this->wishlist);

            // ২. অন্যান্য কম্পোনেন্টকে (যেমন: HeaderWishlistCounter) জানানোর জন্য ইভেন্ট পাঠান
            $this->dispatch('wishlist-updated');
        }
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.extra.wishlist-sidebar');
    }
}
