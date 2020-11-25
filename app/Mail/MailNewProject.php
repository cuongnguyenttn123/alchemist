<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailNewProject extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $timeout = 60;
    public $tries = 2;
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
        // sleep(10);
        return $this->subject('New Project')
                    ->view('email_template.newproject')
                    ->with('data',$this->data);
    }
}
