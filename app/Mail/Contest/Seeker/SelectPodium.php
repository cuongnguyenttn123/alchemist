<?php

namespace App\Mail\Contest\Seeker;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Contest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Mail\Mailer as MailerContract;

class SelectPodium extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $contest;
    public $days;

    /**
     * Create a new message instance.
     *
     * @param App\Models\Contest $contest
     * @param App\Models\User $user
     * @return void
     */
    public function __construct(Contest $contest, User $user)
    {
        $this->contest = $contest;
        $this->user = $user;
        $this->days = Carbon::parse($this->contest->time_start)
            ->diffInDays(Carbon::parse($this->contest->time_end));
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Select Podium')
            ->view('emails.contest.seeker.select-podium');
    }

    /**
     * Set mailable property so it can be used in App\Listeners\MailSentListener
     * 
     * @param  \Illuminate\Contracts\Mail\Mailer $mailer
     * @return void
     */
    public function send(MailerContract $mailer)
    {
        $this->withSwiftMessage(function ($message) {
            $message->mailable = get_class($this);
            $message->contest = $this->contest;
        });

        parent::send($mailer);
    }
}
