<?php

namespace App\Events\DisputeArbiter;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class InviteArbiter
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $dispute;
    public $list;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($event)
    {
        $this->dispute = $event[0];
        $this->list = $event[1];
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
