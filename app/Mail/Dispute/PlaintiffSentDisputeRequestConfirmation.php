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

class PlaintiffSentDisputeRequestConfirmation extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $plaintiff;
    public $defendant;
    public $dispute;
    public $project;
    public $milestone;

    /**
     * Create a new message instance.
     *
     * @param App\Models\User $plaintiff
     * @param App\Models\User $defendant
     * @param App\Models\Dispute $dispute
     * @param App\Models\Project $project
     * @param App\Models\Milestone $milestone
     * @return void
     */
    public function __construct(User $plaintiff, User $defendant, Dispute $dispute, Project $project, Milestone $milestone)
    {
        $this->plaintiff = $plaintiff;
        $this->defendant = $defendant;
        $this->dispute = $dispute;
        $this->project = $project;
        $this->milestone = $milestone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Dispute Request Sent')
            ->view('emails.dispute.plaintiff-sent-dispute-request-confirmation');
    }
}
