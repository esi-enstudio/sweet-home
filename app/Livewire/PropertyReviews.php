<?php

namespace App\Livewire;

use App\Models\Property;
use App\Models\Review;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;

class PropertyReviews extends Component
{
    public Property $property;

    // ফর্মের জন্য প্রোপার্টি
    public int $rating = 0;
    public string $comment = '';
    public string $name = '';
    public string $phone = '';
    public string $email = '';

    public bool $hasAlreadyReviewed = false;

    // নতুন রিভিউ যোগ হওয়ার পর কম্পোনেন্ট রিফ্রেশ করার জন্য
    protected $listeners = ['reviewSubmitted' => '$refresh'];

    public function mount(Property $property): void
    {
        $this->property = $property;

        // mount হওয়ার সময় ফর্মের ফিল্ডগুলো পপুলেট করুন যদি ইউজার লগইন করা থাকে
        if (Auth::check()) {
            $this->name = Auth::user()->name;
            $this->phone = Auth::user()->phone;
            $this->email = Auth::user()->email;

            // চেক করুন এই ইউজার আগে রিভিউ দিয়েছে কি না
            $this->hasAlreadyReviewed = Review::where('property_id', $this->property->id)
                ->where('user_id', Auth::id())
                ->exists();
        }
    }

    // রিভিউগুলো পেজিনেশন সহ লোড করার জন্য
    #[Computed]
    public function reviews(): LengthAwarePaginator
    {
        return $this->property->reviews()
            ->with('user') // রিভিউয়ারের তথ্য
            ->where('is_approved', true)
            ->latest()
            ->paginate(3, pageName: 'reviews-page'); // পেজিনেশনের জন্য আলাদা নাম
    }

    // গড় রেটিং এবং মোট রিভিউ সংখ্যা গণনা করার জন্য
    #[Computed]
    public function reviewSummary(): array
    {
        return [
            'total' => $this->property->reviews()->where('is_approved', true)->count(),
            'average' => round($this->property->reviews()->where('is_approved', true)->avg('rating'), 1)
        ];
    }

    public function submitReview(): void
    {
        // যদি গেস্ট হয়, তাহলে ইমেইল দিয়ে চেক করুন
        if (!Auth::check()) {
            $this->hasAlreadyReviewed = Review::where('property_id', $this->property->id)
                ->where('phone', $this->phone)
                ->exists();
        }

        if ($this->hasAlreadyReviewed) {
            session()->flash('review_error', 'You have already submitted a review for this property.');
            return;
        }

        $validated = $this->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10',
            'name' => 'required|string|max:255',
            'phone' => 'required|digits:11',
            'email' => 'required|email|max:255',
        ]);

        Review::create([
            'property_id' => $this->property->id,
            'user_id' => Auth::id(), // null হবে যদি লগইন না থাকে
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
            'is_approved' => true,
        ]);

        session()->flash('review_success', 'Thank you! Your review is submitted and waiting for approval.');

        // ফর্ম রিসেট করুন এবং রিভিউ দিয়েছে ফ্ল্যাগ সেট করুন
        $this->reset(['rating', 'comment']);
        $this->hasAlreadyReviewed = true;

        // 'reviewSubmitted' নামে একটি ইভেন্ট dispatch করা হচ্ছে
        // এবং সাথে property-র আইডি পাঠানো হচ্ছে, যাতে নির্দিষ্ট কম্পোনেন্ট রিফ্রেশ হয়।
        $this->dispatch('reviewSubmitted', propertyId: $this->property->id);
    }


    public function render(): Factory|View|Application
    {
        return view('livewire.property-reviews');
    }
}
