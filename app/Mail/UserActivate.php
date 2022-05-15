<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserActivate extends Mailable
{
    use Queueable, SerializesModels;

    public $userInformation;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userInformation)
    {
        $this->userInformation = $userInformation;    
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Web Account')
                    ->view('email');
    }
}
