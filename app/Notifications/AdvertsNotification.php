<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AdvertsNotification extends Notification
{
    use Queueable;

    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function via($notifiable)
    {
        return ['database']; // Only use the database notification channel
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'A new advert has been created by ' . $this->name,
            'url' => url('/adverts')
        ];
    }
}
