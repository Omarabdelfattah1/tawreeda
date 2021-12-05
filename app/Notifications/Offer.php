<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Notifications\Notification;
use App\Models\Offer as OfferModel;
class Offer extends Notification
{
    use Queueable;

    public $offer;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($offer_id)
    {
        $this->offer = OfferModel::find($offer_id)->toArray();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','telegram'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toTelegram($notifiable)
    {
        
        return TelegramMessage::create()
            // Optional recipient user id.
            ->to($notifiable->telegram_id)
            // Markdown supported.
            ->content("لديك عرض أسعار جديد");
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return array_merge($this->offer,[
            'message' => 'لديك عرض أسعار جديد',
            'link' => route('buyer.offers.show',['offer'=>$this->offer['id']])
        ]);
    }
}
