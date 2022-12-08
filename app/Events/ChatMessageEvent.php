<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private string $message;
    private string $time;
    private string $name;
    private int $receiver;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message, $name, $time, $receiver)
    {
        $this->message = $message;
        $this->name = $name;
        $this->time = $time;
        $this->receiver = $receiver;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('private.chat.'.$this->receiver);
    }

    public function broadcastAs()
    {
        return "chat-message";
    }

    public function broadcastWith()
    {
        return [
            'time' => $this->time,
            'name' => $this->name,
            'text' => $this->message
        ];
    }
}
