<?php

namespace App\Events;

use App\Models\Entrie;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ShortlistedEntry
{
  use Dispatchable, InteractsWithSockets, SerializesModels;
  public $entrie;
  /**
   * Create a new event instance.
   *
   * @return void
   */
  public function __construct(Entrie $ent)
  {
    $this->entrie = $ent;
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
