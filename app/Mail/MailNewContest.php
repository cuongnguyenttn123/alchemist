<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailNewContest extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    //public $timeout = 60;
    //public $tries = 5;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Contest')
                    ->view('email_template.newcontest')
                    ->with('data',$this->data);
    }
}
