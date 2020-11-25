<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Illuminate\Support\Str;

use App\Mail\MailNewProject;

class NewProjectNotif extends Notification implements ShouldQueue
{
    use Queueable;

    public $tries = 1;
    public $timeout = 60;

    public $project;

    public function __construct($project)
    {
        $this->project = $project;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toDatabase($notifiable)
    {
        $description = strip_tags(Str::limit($this->project->detail_description ?? $n->data->target->rules, 60, ' ...'));
        $name = $this->project->name;
        $price = $this->project->budget;
        $day_left = $this->project->day_left;
        return [
            'type' => 'newproject',
            'title' => 'New Project Alert!',
            'sub_title' => "$name | $$price | $day_left days left",
            'description' => $description,
            'link' => $this->project->permalink(),
        ];
    }

    public function toMail($notifiable)
    {
    }
}
