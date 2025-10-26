<?php

namespace Xactyl\Http\Requests\Api\Client\Servers\Network;

use Xactyl\Models\Permission;
use Xactyl\Http\Requests\Api\Client\ClientApiRequest;

class GetNetworkRequest extends ClientApiRequest
{
    /**
     * Check that the user has permission to view the allocations for
     * this server.
     */
    public function permission(): string
    {
        return Permission::ACTION_ALLOCATION_READ;
    }
}
