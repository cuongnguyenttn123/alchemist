<?php

namespace App\Mail\Contest\Alchemist;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Entrie;
use App\Models\Contest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WinnerContestPaymentAndResults extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $winner;
    public $contest;
    public $days;

    /**
     * Create a new message instance.
     *
     * @param App\Models\Contest $contest
     * @param App\Models\Entrie $winner
     * @return void
     */
    public function __construct(Contest $contest, Entrie $winner)
    {
        $this->contest = $contest;
        $this->winner = $winner;

        $this->contest->load('attachments', 'entries.user');
        $this->contest->entries->sortBy('rank');

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
            ->subject('Contest winner')
            ->to($this->winner->user->email)
            ->view('emails.contest.alchemist.winner-contest-payment-and-results');
    }
}
