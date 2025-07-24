<?php

namespace App\Livewire\Extra;

use App\Models\Property;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class WishlistButton extends Component
{
    public Property $property;
    public bool $isWishlisted;

    public function mount(Property $property): void
    {
        $this->property = $property;
        $this->checkIfWishlisted();
    }

    /**
     * 'wishlist-updated' ইভেন্টটি শোনার পর এই মেথডটি চলবে।
     */
    #[On('wishlist-updated')]
    public function checkIfWishlisted(): void
    {
        // isWishlisted প্রোপার্টিটির মান নতুন করে ডেটাবেস থেকে চেক করে আপডেট করুন
        $this->isWishlisted = Auth::check() && Auth::user()->hasWishlisted($this->property);
    }

    public function toggleWishlist()
    {
        if (!Auth::check()) {
            // ব্যবহারকারীকে লগইন পেজে পাঠান
            return $this->redirect(route('filament.user.auth.login'));
        }

        $user = Auth::user();

        if ($this->isWishlisted) {
            // Wishlist থেকে রিমুভ করুন
            $user->wishlistedProperties()->detach($this->property->id);
        } else {
            // Wishlist-এ যোগ করুন
            $user->wishlistedProperties()->attach($this->property->id);
        }

        // স্ট্যাটাস আপডেট করুন এবং একটি ইভেন্ট পাঠান (ঐচ্ছিক)
        $this->checkIfWishlisted();
        $this->dispatch('wishlist-updated');
    }

    public function updateStatus(): void
    {
        $this->isWishlisted = Auth::check() && Auth::user()->hasWishlisted($this->property);
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.extra.wishlist-button');
    }
}
