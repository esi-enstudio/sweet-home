<?php

namespace App\Notifications;

use App\Models\Message;
use App\Models\Property;
use Illuminate\Bus\Queueable;
use Filament\Notifications\Notification;

class PropertyInquiry extends \Illuminate\Notifications\Notification
{
    use Queueable;

    public Message $inquiry;
    public Property $property;

    /**
     * Create a new notification instance.
     */
    public function __construct(Message $inquiry)
    {
        $this->inquiry = $inquiry;
        $this->property = $inquiry->property;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toDatabase(object $notifiable): array
    {
        return Notification::make()
            ->title('New Inquiry for your property!')
            ->body("You have received a new message from {$this->inquiry->name} for your property: '{$this->property->title}'.")
            ->icon('heroicon-o-chat-bubble-left-ellipsis')
            // এখানে একটি অ্যাকশন বাটন যোগ করা যেতে পারে যা মেসেজটি দেখাবে
            // ->actions([
            //     NotificationAction::make('view')
            //         ->url(MessageResource::getUrl('view', ['record' => $this->inquiry]))
            // ])
            ->getDatabaseMessage();
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
