<?php

namespace App\Notifications;

use App\Http\Traits\FireBase;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderStatusNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $message;

    public function __construct(Order $order)
    {
        $this->message = [
            'title' => 'Blue Gold GYM',
            'body' => "your order request has been " . $order->status,
            'title_ar' => 'تطبيق بلو جولد جيم',
            'body_ar' => sprintf("حالة  طلبك هي %s", __($order->status, [], 'ar')),
            'model_type' => 'order',
            'model_id' => $order->id
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
