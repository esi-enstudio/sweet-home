<?php

namespace App\Observers;

use App\Models\Message;
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
        $propertyOwner = $message->property->user;

        // ৩. যদি মালিক বিদ্যমান থাকে, তাহলে তাকে নোটিফাই করুন
        if ($propertyOwner) {
//            dd($message);
            Notification::make()
                ->title('New Inquiry for your property!')
                ->body("You have received a new message from {$message->name} for your property: '{$message->property->title}'.")
                ->icon('heroicon-o-chat-bubble-left-ellipsis')
                // এখানে একটি অ্যাকশন বাটন যোগ করা যেতে পারে যা মেসেজটি দেখাবে
                // ->actions([
                //     NotificationAction::make('view')
                //         ->url(MessageResource::getUrl('view', ['record' => $this->inquiry]))
                // ])
                ->sendToDatabase($propertyOwner);
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
