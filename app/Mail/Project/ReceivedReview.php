<?php

namespace App\Mail\Project;

use App\Models\User;
use App\Models\Review;
use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReceivedReview extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user_from;
    public $user_to;
    public $review;
    public $project;

    /**
     * Create a new message instance.
     *
     * @param App\Models\User $user_from
     * @param App\Models\User $user_to
     * @param App\Models\Review $review
     * @param App\Models\Project $project
     * @return void
     */
    public function __construct(User $user_from, User $user_to, Review $review, Project $project)
    {
        $this->user_from = $user_from;
        $this->user_to = $user_to;
        $this->review = $review;
        $this->project = $project;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('New review')
            ->view('emails.project.received-review');
    }
}
