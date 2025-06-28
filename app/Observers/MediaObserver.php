<?php

namespace App\Observers;

use App\Models\Media;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MediaObserver
{
    /**
     * Handle the Property "created" event.
     */
    public function created(Media $media): void
    {
        //
    }

    /**
     * Handle the Property "updated" event.
     */
    public function updated(Media $media): void
    {
        // --- পুরোনো থাম্বনেইল ডিলিট করার লজিক ---
        // isDirty('path') চেক করে যে path ফিল্ডটি পরিবর্তন হয়েছে কি না
        if ($media->isDirty('path'))
        {
            $oldImage = $media->getOriginal('path');

            if ($oldImage)
            {
                Storage::disk('public')->delete($oldImage);
            }
        }

        if ($media->isDirty('showcase_image_path'))
        {
            $oldImage = $media->getOriginal('showcase_image_path');

            if ($oldImage)
            {
                Storage::disk('public')->delete($oldImage);
            }
        }
    }

    /**
     * Handle the Property "deleted" event.
     */
    public function deleted(Media $media): void
    {
        // ডিবাগিং-এর জন্য একটি লগ মেসেজ রাখা ভালো
        Log::info("Attempting to delete media file from storage: " . $media->path);

        // কন্ডিশনাল চেক: যদি path থাকে এবং ফাইলটি আসলেই সার্ভারে বিদ্যমান থাকে
        if ($media->path && Storage::disk('public')->exists($media->path)) {

            // 'public' ডিস্ক থেকে ফাইলটি ডিলিট করুন
            Storage::disk('public')->delete($media->path);

            Log::info("Successfully deleted media file: " . $media->path);
        } else {
            Log::warning("Media file not found in storage, but record is being deleted. Path: " . ($media->path ?? 'N/A'));
        }

        Log::info("Attempting to delete media file from storage: " . $media->showcase_image_path);

        // কন্ডিশনাল চেক: যদি showcase_image_path থাকে এবং ফাইলটি আসলেই সার্ভারে বিদ্যমান থাকে
        if ($media->showcase_image_path && Storage::disk('public')->exists($media->showcase_image_path)) {

            // 'public' ডিস্ক থেকে ফাইলটি ডিলিট করুন
            Storage::disk('public')->delete($media->showcase_image_path);

            Log::info("Successfully deleted media file: " . $media->showcase_image_path);
        } else {
            Log::warning("Media file not found in storage, but record is being deleted. Path: " . ($media->showcase_image_path ?? 'N/A'));
        }
    }

    /**
     * Handle the Property "restored" event.
     */
    public function restored(Media $media): void
    {
        //
    }

    /**
     * Handle the Property "force deleted" event.
     */
    public function forceDeleted(Media $media): void
    {
        //
    }
}
