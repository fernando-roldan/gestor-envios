<?php

namespace App\Notifications;

use App\Models\Shipping;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ShippingNotification extends Notification
{
    use Queueable;

    protected $shipping;
    /**
     * Create a new notification instance.
     */
    public function __construct(Shipping $shipping)
    {
        $this->shipping = $shipping;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                        ->subject('Nuevo envío generado')
                        ->line('Se ha generado un nuevo envío con No. ' . $this->shipping->uuid)
                        ->line('Con destino: ' . $this->shipping->destination)
                        ->action('Ver guía', url('/proveedor/envio/'. $this->shipping->id))
                        ->line('Sube tu cotización desde tu portal.');
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
