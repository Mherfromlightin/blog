<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('email.welcome', compact('user'));
    }

    /**
     * @param mixed $user
     * @return welcome
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }
}
