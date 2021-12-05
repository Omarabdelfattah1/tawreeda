<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Notifications\Notification;
// use App\Events\CallEvent;
use App\Models\Call as CallModel;
class Call extends Notification
{
    use Queueable;

    protected $call;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($call_id)
    {
        $this->call = CallModel::with('buyer')->find($call_id)->toArray();
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

    public function toTelegram($notifiable)
    {
        
        return TelegramMessage::create()
            // Optional recipient user id.
            ->to($notifiable->telegram_id)
            // Markdown supported.
            ->content(
                "لديك طلب إتصال من شركة "
            );
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

    // public function toBroadcast($notifiable){
    //     return new CallEvent([
    //         'data' => "لديك طلب إتصال من شركة "
    //         . $this->call['name']

    //     ]);
    // }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return array_merge($this->call,[
            'message' => 'لديك طلب إتصال جديد',
            'link' => route('buyer.calls')
        ]);
    }
}
