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
        // যখনই কোনো রিভিউ সেভ (তৈরি বা আপডেট) হবে, এই মেথডটি চলবে
        $this->updatePropertyReviewStats($review->property);
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
        // যখন কোনো রিভিউ ডিলিট হবে
        $this->updatePropertyReviewStats($review->property);
    }

    /**
     * Handle the Review "restored" event.
     */
    public function restored(Review $review): void
    {
        //
    }

    /**
     * Handle the Review "force deleted" event.
     */
    public function forceDeleted(Review $review): void
    {
        //
    }

    /**
     * Update the review stats for a given property.
     */
    protected function updatePropertyReviewStats($property): void
    {
        if ($property) {
            // শুধুমাত্র অনুমোদিত রিভিউগুলো গণনা করুন
            $approvedReviews = $property->reviews()->where('is_approved', true);

            $property->review_count = $approvedReviews->count();
            $property->average_rating = $approvedReviews->avg('rating') ?? 0;

            // `saveQuietly()` ব্যবহার করলে এটি আবার কোনো ইভেন্ট ফায়ার করবে না, যা ইনফিনিট লুপ প্রতিরোধ করে।
            $property->saveQuietly();
        }
    }
}
