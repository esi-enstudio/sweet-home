<?php

namespace App\Observers;

use App\Models\Review;

class ReviewObserver
{
    /**
     * Handle the Review "created" event.
     */
    public function created(Review $review): void
    {
        $this->updatePropertyRating($review->property);
    }

    /**
     * Handle the Review "updated" event.
     */
    public function updated(Review $review): void
    {
        //
    }

    /**
     * Handle the Review "deleted" event.
     */
    public function deleted(Review $review): void
    {
        $this->updatePropertyRating($review->property);
    }

    /**
     * Handle the Review "restored" event.
     */
    public function restored(Review $review): void
    {
        $this->updatePropertyRating($review->property);
    }

    /**
     * Handle the Review "force deleted" event.
     */
    public function forceDeleted(Review $review): void
    {
        //
    }

    protected function updatePropertyRating($property): void
    {
        $reviews = $property->reviews()->get();
        $property->review_count = $reviews->count();
        $property->average_rating = $reviews->avg('rating') ?? 0;
        $property->save();
    }
}
