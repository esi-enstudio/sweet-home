<?php

namespace App\Observers;

use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;

class TestimonialObserver
{
    /**
     * Handle the Testimonial "created" event.
     */
    public function created(Testimonial $testimonial): void
    {
        //
    }

    /**
     * Handle the Testimonial "updated" event.
     */
    public function updated(Testimonial $testimonial): void
    {
        // যদি পরিবর্তনকারী অ্যাডমিন না হয়
        if (Auth::check() && !Auth::user()->hasRole('super_admin')) {

            // যদি ফিডব্যাক টেক্সট বা ডেজিগনেশন পরিবর্তন হয়ে থাকে
            if ($testimonial->isDirty('feedback_text') || $testimonial->isDirty('client_designation')) {

                // is_published-কে false করে দাও, যাতে এটি আবার রিভিউ হয়
                $testimonial->is_published = false;
            }
        }
    }

    /**
     * Handle the Testimonial "deleted" event.
     */
    public function deleted(Testimonial $testimonial): void
    {
        //
    }

    /**
     * Handle the Testimonial "restored" event.
     */
    public function restored(Testimonial $testimonial): void
    {
        //
    }

    /**
     * Handle the Testimonial "force deleted" event.
     */
    public function forceDeleted(Testimonial $testimonial): void
    {
        //
    }
}
