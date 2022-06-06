<?php

namespace App\Notifications;

use App\Http\Traits\FireBase;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class MessageNotification extends Notification
{
    use Queueable;

    private $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        //
        $this->message = [
            'title' => 'Blue Gold GYM',
            'body' => "لديك رسالة جديدة من الادارة " ,
            'title_ar' => 'تطبيق بلو جولد جيم',
            'body_ar' => "لديك رسالة جديدة من الادارة",
            'model_type' => 'chat',
            'model_id' => 0
        ];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', FireBaseChannel::class];
    }

    public function toArray($notifiable)
    {
        return $this->message;
    }

    public function toFireBase($notifiable)
    {
        FireBase::notification($notifiable, $this->message['title'], $this->message['body'], $this->message);
    }
}
