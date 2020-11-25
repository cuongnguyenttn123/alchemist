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

class DefendantPlaintiffRequestedDispute extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $plaintiff;
    public $defendant;
    public $project;
    public $dispute;
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
        $this->project = $project;
        $this->dispute = $dispute;
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
            ->subject('Milestone disputed')
            ->view('emails.dispute.defendant-plaintiff-requested-dispute');
    }
}
