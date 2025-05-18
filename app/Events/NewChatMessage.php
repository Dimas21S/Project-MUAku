<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewChatMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('chat.' . $this->message->receiver_id),
        ];
    }

    /**
     * Get the name of the event.
     *
     * @return string
     */
    public function broadcastAs(): string
    {
        return 'new-message';
    }
    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith(): array
    {
        return [
            'message' => $this->message,
        ];
    }
    /**
     * Get the broadcast metadata.
     *
     * @return array
     */
    public function broadcastMetadata(): array
    {
        return [
            'sender_id' => $this->message->sender_id,
            'receiver_id' => $this->message->receiver_id,
        ];
    }
    /**
     * Get the broadcast queue name.
     *
     * @return string
     */
    public function broadcastQueue(): string
    {
        return 'chat-messages';
    }
}
