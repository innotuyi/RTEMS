<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Bid;

class NewBidNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $bid;

    public function __construct(Bid $bid)
    {
        $this->bid = $bid;
    }

    public function via($notifiable)
    {
        return ['mail']; // You can also add 'database' or 'broadcast'
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('New Bid Available')
                    ->greeting('Hello ' . $notifiable->name . ',')
                    ->line('A new bid titled "' . $this->bid->title . '" has been posted.')
                    ->line('Category: ' . $this->bid->category)
                    ->line('Budget: ' . $this->bid->budget . ' ' . $this->bid->currency)
                    ->action('View Bid', url('/bids/' . $this->bid->id))
                    ->line('Thank you for being with us!');
    }

    public function toArray($notifiable)
    {
        return [
            'bid_id' => $this->bid->id,
            'title' => $this->bid->title,
            'category' => $this->bid->category,
        ];
    }
}
