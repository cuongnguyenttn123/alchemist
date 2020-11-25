<?php

namespace App\Mail\Project\Alchemist;

use App\Models\User;
use App\Models\Project;
use App\Models\Milestone;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MilestonePaid extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $payer;
    public $project;
    public $paid_milestone;

    /**
     * Create a new message instance.
     *
     * @param App\Models\User $user
     * @param App\Models\User $payer
     * @param App\Models\Project $project
     * @param App\Models\Milestone $paid_milestone
     * @return void
     */
    public function __construct(User $user, User $payer, Project $project, Milestone $paid_milestone)
    {
        $this->user = $user;
        $this->payer = $payer;
        $this->project = $project;
        $this->paid_milestone = $paid_milestone;

        // $this->project->load([
        //     'milestone.payment.status' => function ($query) {
        //         $query->orderBy('created_at');
        //     }
        // ]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
          ->subject('Milestone Payment')
          ->view('emails.project.alchemist.milestone-paid');
    }
}
