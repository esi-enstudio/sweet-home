<?php

namespace App\Notifications;

use App\Models\Message;
use App\Models\Property;
use Filament\Notifications\Notification;
use Illuminate\Bus\Queueable;
use Filament\Notifications\Actions\Action as NotificationAction;
use App\Filament\Resources\MessageResource as AdminMessageResource;
use App\Filament\User\Resources\MessageResource as UserMessageResource;

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
        $url = '';

        // যদি নোটিফাই করা ব্যবহারকারীর 'Admin' রোল থাকে
        if ($notifiable->hasRole('super-admin')) {
            // অ্যাডমিন রিসোর্স ব্যবহার করে URL তৈরি করুন
            // getUrl-এর দ্বিতীয় প্যারামিটারটি হলো প্যানেলের আইডি
            $url = AdminMessageResource::getUrl('index', [], panel: 'admin');
        } else {
            // ইউজার রিসোর্স ব্যবহার করে URL তৈরি করুন
            $url = UserMessageResource::getUrl('index', [], panel: 'user');
        }

        return Notification::make()
            ->title("New Inquiry for: {$this->property->title}")
            ->body("You received a new message from {$this->inquiry->name}.")
            ->icon('heroicon-o-chat-bubble-left-ellipsis')
            ->actions([
                NotificationAction::make('view_message')
                    ->label('View message')
                    ->url($url)
                    ->markAsRead(),
            ])
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
