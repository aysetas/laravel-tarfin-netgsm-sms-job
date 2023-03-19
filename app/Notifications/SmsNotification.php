<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use TarfinLabs\Netgsm\NetgsmChannel;
use TarfinLabs\Netgsm\Sms\NetgsmSmsMessage;

class SmsNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [NetGsmChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toNetgsm($notifiable)
    {
        return (new NetGsmSmsMessage("Hello! Welcome to the club {$notifiable->name}!"));
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
