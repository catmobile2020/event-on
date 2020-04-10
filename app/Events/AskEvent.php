<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AskEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $ask;

    public function __construct($ask)
    {
        $this->ask = $ask;
    }

    public function broadcastOn()
    {
        return \Redis::publish('ask-channel.'.$this->ask['speaker_id'], json_encode([
            'event' => 'AskEvent',
            'data'  => $this->ask
        ]));
//        return new Channel('ask-channel.'.$this->ask['speaker_id']);
    }
}
