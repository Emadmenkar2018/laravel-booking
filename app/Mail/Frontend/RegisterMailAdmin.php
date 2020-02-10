<?php

namespace App\Mail\Frontend;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;

class RegisterMailAdmin extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * The user instance.
     *
     * @var User
     */
    public $user;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = config('app.name').' Registration';
        
        return $this->view('frontend.emails.registerAdmin')
                    ->subject($subject);
    }
}
