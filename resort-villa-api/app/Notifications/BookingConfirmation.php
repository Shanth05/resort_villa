<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class BookingConfirmation extends Notification
{
    use Queueable;

    protected $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Booking Confirmation')
                    ->line('Your booking has been confirmed!')
                    ->line('Villa: ' . $this->booking->villa->name)
                    ->line('Check-In: ' . $this->booking->check_in)
                    ->line('Check-Out: ' . $this->booking->check_out)
                    ->line('Total Price: LKR ' . $this->booking->total_price)
                    ->action('View Booking', url('/bookings/' . $this->booking->id))
                    ->line('Thank you for choosing our resort!');
    }
}