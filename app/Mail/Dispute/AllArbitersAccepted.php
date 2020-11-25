<?php

namespace App\Mail\Dispute;

use App\Models\User;
use App\Models\Dispute;
use App\Models\Project;
use App\Models\Milestone;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AllArbitersAccepted extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $dispute;
    public $project;
    public $milestone;
    public $receiver;

    /**
     * Create a new message instance.
     *
     * @param App\Models\Dispute $dispute
     * @param App\Models\Project $project
     * @param App\Models\Milestone $milestone
     * @param App\Models\User $milestone
     * @return void
     */
    public function __construct(Dispute $dispute, Project $project, Milestone $milestone, User $receiver)
    {
        $this->dispute = $dispute;
        $this->project = $project;
        $this->milestone = $milestone;
        $this->receiver = $receiver;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('All Arbiters Accepted')
            ->view('emails.dispute.all-arbiters-accepted');
    }
}
