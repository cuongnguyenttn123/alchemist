<?php

namespace App\Mail\Project\Alchemist;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProjectsNew extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $projects;

    /**
     * Create a new message instance.
     *
     * @param App\Models\User $user
     * @param \Illuminate\Database\Eloquent\Collection $projects Collection of projects
     * @return void
     */
    public function __construct(User $user, \Illuminate\Database\Eloquent\Collection $projects)
    {
        $this->user = $user;
        $this->projects = $projects;

        $projects->load('skills', 'categories');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->to($this->user->email)
            ->subject('New Projects')
            ->view('emails.project.alchemist.projects-new');
    }
}
