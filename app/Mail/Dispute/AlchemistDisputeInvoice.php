<?php

namespace App\Mail\Dispute;

use App\Models\User;
use App\Models\Dispute;
use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AlchemistDisputeInvoice extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $dispute;
    public $sender;
    public $receiver;
    public $project;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $sender, User $receiver, Dispute $dispute, Project $project)
    {
        $this->sender = $sender;
        $this->receiver = $receiver;
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
        return $this->view('emails.dispute.alchemist-dispute-invoice');
    }
}
