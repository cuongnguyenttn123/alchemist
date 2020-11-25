<?php

namespace App\Mail\Contest\Alchemist;

use Carbon\Carbon;
use App\Models\Entrie;
use App\Models\Contest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RunnerUpContestResults extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $runnerUp;
    public $contest;
    public $days;

    /**
     * Create a new message instance.
     
     * @param App\Models\Contest $contest
     * @param App\Models\Entrie $runnerUp
     * @return void
     */
    public function __construct(Contest $contest, Entrie $runnerUp)
    {
        $this->runnerUp = $runnerUp;
        $this->contest = $contest;

        $this->contest->load('entries.user');
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
            ->subject('Contest runner up')
            ->to($this->runnerUp->user->email)
            ->view('emails.contest.alchemist.runner-up-contest-results');
    }
}
