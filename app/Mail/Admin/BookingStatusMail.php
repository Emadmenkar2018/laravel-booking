<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Booking;

class BookingStatusMail extends Mailable
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
        $subject = config('app.name').' Booking Status';
        
        return $this->view('admin.emails.bookingStatus')
                    ->subject($subject);
    }
}
