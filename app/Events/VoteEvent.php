<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class VoteEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $poll;
    public $event_id;
    public function __construct($view,$event_id)
    {
        $this->poll = [
           'view'=>$view,
           'owner_id'=>auth()->id(),
        ];
        $this->event_id = $event_id;
    }

    public function broadcastOn()
    {
        return \Redis::publish('vote-channel.'.$this->event_id, json_encode([
            'event' => 'VoteEvent',
            'data'  => $this->poll
        ]));
    }
}
