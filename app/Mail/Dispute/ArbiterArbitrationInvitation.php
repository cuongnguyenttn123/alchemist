<?php

namespace App\Mail\Dispute;

use App\Models\User;
use App\Models\Dispute;
use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ArbiterArbitrationInvitation extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $invited;
    public $host;
    public $dispute;
    public $project;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $invited, User $host, Dispute $dispute, Project $project)
    {
        $this->invited = $invited;
        $this->host = $host;
        $this->dispute = $dispute;
        $this->project = $project;

        $this->project->load('milestone');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->to($this->invited->email)
            ->subject('Arbitration Invitation')
            ->view('emails.dispute.arbiter-arbitration-invitation');
    }
}
