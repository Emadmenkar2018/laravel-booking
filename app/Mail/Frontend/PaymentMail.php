<?php

namespace App\Mail\Frontend;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Transaction;

class PaymentMail extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * The transaction instance.
     *
     * @var Transaction
     */
    public $transaction;
    
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = config('app.name').' Payment';
        
        return $this->view('frontend.emails.payment')
                    ->subject($subject);
    }
}
