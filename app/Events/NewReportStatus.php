<?php


namespace App\Events;


use App\Models\Post;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewReportStatus
{
  use Dispatchable, InteractsWithSockets, SerializesModels;
  public $post;
  public $text;
  public $user_report;
  /**
   * Create a new event instance.
   *
   * @return void
   */
  public function __construct(Post $post, User $user_report, array $text)
  {
    $this->post = $post;
    $this->text = $text;
    $this->user_report = $user_report;
  }

  /**
   * Get the channels the event should broadcast on.
   *
   * @return \Illuminate\Broadcasting\Channel|array
   */
  public function broadcastOn()
  {
    return new PrivateChannel('channel-name');
  }

}
