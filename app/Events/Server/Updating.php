<?php

namespace Xactyl\Events\Server;

use Xactyl\Events\Event;
use Xactyl\Models\Server;
use Illuminate\Queue\SerializesModels;

class Updating extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public Server $server)
    {
    }
}
