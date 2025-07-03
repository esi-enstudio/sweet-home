<?php

namespace App\Livewire;

use App\Models\Property;
use App\Models\Review;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class SingleProperty extends Component
{
    public Property $property;

    // রিভিউ ফর্মের জন্য
    public int $rating = 5;
    public string $comment = '';
    public string $reviewerName = '';
    public string $reviewerEmail = '';

    public function mount(Property $property): void
    {
        // View পেজের জন্য প্রয়োজনীয় সব রিলেশনশিপ ইগার লোড করুন
        $this->property = $property->load([
            'user',
            'propertyType',
            'tenants', // Many-to-Many
            'media',
            'amenities',
            'spaceOverviews',
            'floorPlans',
            'reviews.user' // রিভিউ এবং রিভিউয়ারের তথ্য
        ]);
    }

    // "Related Properties" লোড করার জন্য
    #[Computed]
    public function relatedProperties()
    {
        return Property::where('property_type_id', $this->property->property_type_id)
            ->where('id', '!=', $this->property->id) // বর্তমান প্রপার্টি বাদ দিয়ে
            ->where('is_available', true)
            ->with(['user'])
            ->latest()
            ->take(4)
            ->get();
    }

    // রিভিউ সাবমিট করার জন্য
    public function submitReview(): void
    {
        $this->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10',
            'reviewerName' => 'required|string',
            'reviewerEmail' => 'required|email',
        ]);

        Review::create([
            'property_id' => $this->property->id,
            'user_id' => auth()->id() ?? null, // যদি লগইন করা ইউজার থাকে
            'name' => $this->reviewerName,
            'email' => $this->reviewerEmail,
            'rating' => $this->rating,
            'comment' => $this->comment,
            'is_approved' => false, // অ্যাডমিন অ্যাপ্রুভ করবে
        ]);

        session()->flash('review_success', 'Thank you! Your review has been submitted for approval.');
        $this->reset(['rating', 'comment', 'reviewerName', 'reviewerEmail']);
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.single-property')
            ->title('Property Details' .' :: '. config('app.name'));
    }
}
