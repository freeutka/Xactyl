<?php

namespace Xactyl\Events\Subuser;

use Xactyl\Events\Event;
use Xactyl\Models\Subuser;
use Illuminate\Queue\SerializesModels;

class Deleting extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public Subuser $subuser)
    {
    }
}
