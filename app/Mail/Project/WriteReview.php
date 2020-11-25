<?php

namespace App\Mail\Project;

use App\Models\User;
use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;

class WriteReview extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user_from;
    public $user_to;
    public $project;
    public $isForSeeker;
    public $dateTime;

    /**
     * Create a new message instance.
     *
     * @param App\Models\User $user_from
     * @param App\Models\User $user_to
     * @param App\Models\Project $project
     * @param Carbon\Carbon $dateTime
     * @param bool $isForSeeker Whether the mail will be send to a seeker or not
     * @return void
     */
    public function __construct(User $user_from, User $user_to, Project $project, Carbon $dateTime, bool $isForSeeker = false)
    {
        $this->user_from = $user_from;
        $this->user_to = $user_to;
        $this->project = $project;
        $this->dateTime = $dateTime;
        $this->isForSeeker = $isForSeeker;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
          ->subject('Write a review')
          ->view('emails.project.write-review');
    }
}
