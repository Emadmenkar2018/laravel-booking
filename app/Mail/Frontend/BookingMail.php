<?php

namespace App\Mail\Frontend;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Booking;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * The booking instance.
     *
     * @var Booking
     */
    public $booking;
    
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = config('app.name').' Booking';
        
        return $this->view('frontend.emails.booking')
                    ->subject($subject);
    }
}
