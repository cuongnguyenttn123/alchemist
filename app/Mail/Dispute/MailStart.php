<?php

namespace App\Mail\Dispute;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailStart extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $timeout = 60;
    public $tries = 1;
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
        return $this->subject('Dispute Start')
                    ->view('email_template.dispute-start')
                    ->with('data',$this->data);
    }
}
