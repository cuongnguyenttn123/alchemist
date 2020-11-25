<?php

namespace App\Mail\Dispute;

use App\Models\Arbiter;
use App\Models\Dispute;
use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;

class ArbiterResult extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $dispute;
    public $project;
    public $arbiters;
    public $won;

    /**
     * Create a new message instance.
     *
     * @param App\Models\Arbiter $arbiter
     * @param App\Models\Dispute $dispute
     * @param App\Models\Project $project
     * @param Illuminate\Database\Eloquent\Collection $arbiters
     * @param bool $won Whether the arbiter won or not
     * @return void
     */
    public function __construct(Arbiter $arbiter, Dispute $dispute, Project $project, Collection $arbiters, bool $won)
    {
        $this->user = $arbiter->user_arbiter;
        $this->dispute = $dispute;
        $this->project = $project;
        $this->arbiters = $arbiters;
        $this->won = $won;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('You ' . ($this->won ? 'won' : 'lost'))
            ->view('emails.dispute.arbiter-result');
    }
}
