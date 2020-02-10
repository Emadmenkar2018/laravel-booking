<?php

namespace App\Mail\Frontend;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Enquiry;

class EnquiryMail extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * The Enquiry instance.
     *
     * @var Enquiry
     */
    public $enquiry;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Enquiry $enquiry)
    {
        $this->enquiry = $enquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = config('app.name').' Enquiry';
        
        return $this->view('frontend.emails.enquiry')
                    ->subject($subject);
    }
}
