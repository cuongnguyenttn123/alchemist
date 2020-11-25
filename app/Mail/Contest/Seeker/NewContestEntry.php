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

class NewContestEntry extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $contest;
    public $new_entry;
    public $days;

    /**
     * Create a new message instance.
     *
     * @param App\Models\Contest $contest
     * @param App\Models\User $user
     * @param App\Models\Entrie $new_entry
     * @return void
     */
    public function __construct(Contest $contest, User $user, Entrie $new_entry)
    {
        $this->contest = $contest;
        $this->user = $user;
        $this->new_entry = $new_entry;

        $this->contest;
        $this->new_entry->preview_attachments = $this->new_entry->preview_attachments();

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
        return $this->view('emails.contest.seeker.new-contest-entry');
    }
}
