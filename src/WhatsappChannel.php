<?php

namespace Logicalcrow\Whatsapp;

use Logicalcrow\Whatsapp\Facade\Whatsapp;
use Logicalcrow\Whatsapp\Exceptions\InvalidMessageException;
use Logicalcrow\Whatsapp\Messages\WhatsappMessage;
use Illuminate\Notifications\Notification;

class WhatsappChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $phones = $notifiable->routeNotificationFor('whatsapp', $notification);

        if (empty($phones)) {
            return [];
        }

        $message = $notification->toWhatsapp($notifiable);

        if (!$message instanceof WhatsappMessage) {
            throw new InvalidMessageException($message);
        }

        return Whatsapp::send($phones, $message);
    }
}
