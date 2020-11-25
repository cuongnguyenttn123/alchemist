<?php

namespace App\Mail\Project\Alchemist;

use App\Models\Bid;
use App\Models\User;
use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BidAwardedAction extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $alchemist;
    public $seeker;
    public $bid;
    public $project;

    /**
     * Create a new message instance.
     *
     * @param App\Models\User $alchemist
     * @param App\Models\User $seeker
     * @param App\Models\Bid $bid
     * @param App\Models\Project $project
     * @return void
     */
    public function __construct(User $alchemist, User $seeker, Bid $bid, Project $project)
    {
        $this->alchemist = $alchemist;
        $this->seeker = $seeker;
        $this->bid = $bid;
        $this->project = $project;

        $this->bid->load('bid_status');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
          ->subject('Your Bid Was Accepted')
          ->view('emails.project.alchemist.bid-awarded-action');
    }
}
