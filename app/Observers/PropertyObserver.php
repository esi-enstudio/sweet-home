<?php

namespace App\Observers;

use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class PropertyObserver
{
    /**
     * Handle the Property "created" event.
     */
    public function created(Property $property): void
    {
        $property->propertyType->increment('properties_count');
    }

    /**
     * Handle the Property "updated" event.
     */
    public function updated(Property $property): void
    {
        // isDirty() চেক করে যে property_type_id ফিল্ডটি পরিবর্তন হয়েছে কি না
        if ($property->isDirty('property_type_id')) {
            // পুরোনো ক্যাটাগরির কাউন্টার কমাও
            $originalPropertyTypeId = $property->getOriginal('property_type_id');
            if ($originalPropertyTypeId) {
                PropertyType::find($originalPropertyTypeId)?->decrement('properties_count');
            }

            // নতুন ক্যাটাগরির কাউন্টার বাড়াও
            $property->propertyType->increment('properties_count');
        }

        // --- পুরোনো থাম্বনেইল ডিলিট করার লজিক ---
        // isDirty('thumbnail') চেক করে যে thumbnail ফিল্ডটি পরিবর্তন হয়েছে কি না
        if ($property->isDirty('thumbnail'))
        {
            $oldThumbnail = $property->getOriginal('thumbnail');

            if ($oldThumbnail)
            {
                Storage::disk('public')->delete($oldThumbnail);
            }
        }
    }

    /**
     * Handle the Property "deleted" event.
     */
    public function deleted(Property $property): void
    {
        $property->propertyType->decrement('properties_count');

        // ১. মূল থাম্বনেইল ডিলিট করুন
        if ($property->thumbnail)
        {
            Storage::disk('public')->delete($property->thumbnail);
        }
    }

    /**
     * Handle the Property "restored" event.
     */
    public function restored(Property $property): void
    {
        //
    }

    /**
     * Handle the Property "force deleted" event.
     */
    public function forceDeleted(Property $property): void
    {
        //
    }
}
