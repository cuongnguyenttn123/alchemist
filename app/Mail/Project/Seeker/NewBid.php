<?php

namespace App\Mail\Project\Seeker;

use App\Models\Bid;
use App\Models\User;
use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewBid extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $seeker;
    public $alchemist;
    public $project;
    public $bid;

    /**
     * Create a new message instance.
     *
     * @param App\Models\User $seeker
     * @param App\Models\User $alchemist
     * @param App\Models\Project $project
     * @param App\Models\Bid $bid
     * @return void
     */
    public function __construct(User $seeker, User $alchemist, Project $project, Bid $bid)
    {
        $this->seeker = $seeker;
        $this->alchemist = $alchemist;
        $this->project = $project;
        $this->bid = $bid;

        $this->project->load(['milestone.payment.status' => function ($query) {
            $query->orderBy('created_at');
        }, 'skills', 'categories', 'attachments']);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->to($this->seeker->email)
            ->subject('New Bid')
            ->view('emails.project.seeker.new-bid');
    }
}
