<?php

namespace Xactyl\Http\Requests\Api\Client\Servers\Network;

use Xactyl\Models\Permission;
use Xactyl\Http\Requests\Api\Client\ClientApiRequest;

class DeleteAllocationRequest extends ClientApiRequest
{
    public function permission(): string
    {
        return Permission::ACTION_ALLOCATION_DELETE;
    }
}
