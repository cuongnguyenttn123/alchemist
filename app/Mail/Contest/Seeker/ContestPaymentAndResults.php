<?php

namespace App\Mail\Contest\Seeker;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Entrie;
use App\Models\Contest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContestPaymentAndResults extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $winner;
    public $contest;
    public $days;

    /**
     * Create a new message instance.
     
     * @param App\Models\Contest $contest
     * @param App\Models\User $user The seeker
     * @param App\Models\Entrie $winner The winner
     * @return void
     */
    public function __construct(Contest $contest, User $seeker, Entrie $winner)
    {
        $this->contest = $contest;
        $this->user = $seeker;
        $this->winner = $winner;

        $this->contest->load('attachments', 'entries.user');

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
            ->subject('Contest Results & Payment Confirmation')
            ->view('emails.contest.seeker.contest-payment-and-results');
    }
}
