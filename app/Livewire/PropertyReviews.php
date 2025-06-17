<?php

namespace App\Livewire;

use App\Models\Property;
use App\Models\Review;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PropertyReviews extends Component
{
    public Property $property;
    public $reviews;

    public int $rating = 0;
    public string $comment = '';
    public bool $hasReviewed;

    public function mount(Property $property): void
    {
        $this->property = $property;
        $this->loadReviews();
        $this->checkIfUserHasReviewed();
    }

    // রিভিউগুলো নতুন থেকে পুরানো ক্রমে লোড হবে
    public function loadReviews(): void
    {
        $this->reviews = $this->property->reviews()->with('user')->latest()->get();
    }

    public function checkIfUserHasReviewed(): void
    {
        if (Auth::check()) {
            $this->hasReviewed = $this->property->reviews()->where('user_id', Auth::id())->exists();
        } else {
            $this->hasReviewed = false;
        }
    }

    public function saveReview()
    {
        // ইউজার লগইন করা না থাকলে রিভিউ দিতে পারবে না
        if (!Auth::check()) {
            return $this->redirect(route('login'), navigate: true);
        }

        $this->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10',
        ]);

        // একজন ইউজার একবারই রিভিউ দিতে পারবে
        if ($this->hasReviewed) {
            session()->flash('error', 'You have already reviewed this property.');
            return;
        }

        Review::create([
            'property_id' => $this->property->id,
            'user_id' => Auth::id(),
            'rating' => $this->rating,
            'comment' => $this->comment,
        ]);

        // ফর্ম রিসেট করুন
        $this->rating = 0;
        $this->comment = '';

        // রিভিউ তালিকা এবং ফ্ল্যাগ রিফ্রেশ করুন
        $this->loadReviews();
        $this->checkIfUserHasReviewed();

        session()->flash('success', 'Thank you for your review!');
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.property-reviews');
    }
}
