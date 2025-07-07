<?php

namespace App\Observers;

use App\Models\Message;
use App\Notifications\PropertyInquiry;
use Filament\Notifications\Notification;

class MessageObserver
{
    /**
     * Handle the Message "created" event.
     */
    public function created(Message $message): void
    {
        // ১. মেসেজের সাথে সম্পর্কিত প্রপার্টি এবং তার মালিককে লোড করুন
        // load() ব্যবহার করা হচ্ছে যাতে অতিরিক্ত কুয়েরি না চলে
        $message->load('property.user');

        // ২. প্রপার্টি এবং তার মালিককে খুঁজে বের করুন
        $propertyOwner = $message->property?->user;

        // ৩. যদি মালিক বিদ্যমান থাকে, তাহলে তাকে নোটিফাই করুন
        if ($propertyOwner) {
            // --- এখানে পরিবর্তন করা হয়েছে ---
            // Laravel-এর নিজস্ব notify() মেথড ব্যবহার করা হচ্ছে
            $propertyOwner->notify(new PropertyInquiry($message));
        }
    }

    /**
     * Handle the Message "updated" event.
     */
    public function updated(Message $message): void
    {
        //
    }

    /**
     * Handle the Message "deleted" event.
     */
    public function deleted(Message $message): void
    {
        //
    }

    /**
     * Handle the Message "restored" event.
     */
    public function restored(Message $message): void
    {
        //
    }

    /**
     * Handle the Message "force deleted" event.
     */
    public function forceDeleted(Message $message): void
    {
        //
    }
}
