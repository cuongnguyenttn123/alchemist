<?php

namespace App\Mail\Project\Seeker;

use App\Models\User;
//use NumberFormatter;
use App\Models\Project;
use App\Models\Milestone;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\MilestoneRequest;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MilestonePaymentRequest extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $alchemist;
    public $seeker;
    public $milestoneRequest;
    public $requested_milestone_position;
    public $project;

    /**
     * Create a new message instance.
     *
     * @param App\Models\User $alchemist
     * @param App\Models\User $seeker
     * @param App\Models\Project $project
     * @param App\Models\MilestoneRequest $milestoneRequest
     * @return void
     */
    public function __construct(User $alchemist, User $seeker, Project $project, MilestoneRequest $milestoneRequest)
    {
        $this->alchemist = $alchemist;
        $this->seeker = $seeker;
        $this->milestoneRequest = $milestoneRequest;
        $this->project = $project;

        $this->project->load(['accepted_milestones.payment.status' => function ($query) {
            $query->orderBy('created_at');
        }]);

        $this->requested_milestone_position = $this->project->accepted_milestones->search(function ($item, $key) use ($milestoneRequest) {
            return $item->id === $this->milestoneRequest->milestone->id;
        }) + 1;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
          ->subject('Milestone Payment Request')
          ->view('emails.project.seeker.milestone-payment-request');
    }
}
