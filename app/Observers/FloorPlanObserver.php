<?php

namespace App\Observers;

use App\Models\FloorPlan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FloorPlanObserver
{
    /**
     * Handle the Property "created" event.
     */
    public function created(FloorPlan $floorPlan): void
    {
        //
    }

    /**
     * Handle the Property "updated" event.
     */
    public function updated(FloorPlan $floorPlan): void
    {
        // --- পুরোনো থাম্বনেইল ডিলিট করার লজিক ---
        // isDirty('image_path') চেক করে যে image_path ফিল্ডটি পরিবর্তন হয়েছে কি না
        if ($floorPlan->isDirty('image_path'))
        {
            $oldImage = $floorPlan->getOriginal('image_path');

            if ($oldImage)
            {
                Storage::disk('public')->delete($oldImage);
            }
        }
    }

    /**
     * Handle the Property "deleted" event.
     */
    public function deleted(FloorPlan $floorPlan): void
    {
        // ডিবাগিং-এর জন্য একটি লগ মেসেজ রাখা ভালো
        Log::info("Attempting to delete media file from storage: " . $floorPlan->image_path);

        // কন্ডিশনাল চেক: যদি image_path থাকে এবং ফাইলটি আসলেই সার্ভারে বিদ্যমান থাকে
        if ($floorPlan->image_path && Storage::disk('public')->exists($floorPlan->image_path)) {

            // 'public' ডিস্ক থেকে ফাইলটি ডিলিট করুন
            Storage::disk('public')->delete($floorPlan->image_path);

            Log::info("Successfully deleted media file: " . $floorPlan->image_path);
        } else {
            Log::warning("Media file not found in storage, but record is being deleted. Path: " . ($floorPlan->image_path ?? 'N/A'));
        }
    }

    /**
     * Handle the Property "restored" event.
     */
    public function restored(FloorPlan $floorPlan): void
    {
        //
    }

    /**
     * Handle the Property "force deleted" event.
     */
    public function forceDeleted(FloorPlan $floorPlan): void
    {
        //
    }
}
