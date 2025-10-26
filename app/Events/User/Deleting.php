<?php

namespace Xactyl\Events\User;

use Xactyl\Models\User;
use Xactyl\Events\Event;
use Illuminate\Queue\SerializesModels;

class Deleting extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public User $user)
    {
    }
}
