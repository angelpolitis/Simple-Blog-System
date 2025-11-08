<?php

namespace App\Events;

use App\Models\Comment;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CommentCreated implements ShouldBroadcast {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Comment $comment;

    /**
     * Create a new event instance.
     */
    public function __construct (Comment $comment) {
        $this->comment = $comment;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn () : PrivateChannel {
        return new PrivateChannel('post.' . $this->comment->post_id);
    }
}
