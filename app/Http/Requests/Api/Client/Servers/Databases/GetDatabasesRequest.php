<?php

namespace Xactyl\Http\Requests\Api\Client\Servers\Databases;

use Xactyl\Models\Permission;
use Xactyl\Contracts\Http\ClientPermissionsRequest;
use Xactyl\Http\Requests\Api\Client\ClientApiRequest;

class GetDatabasesRequest extends ClientApiRequest implements ClientPermissionsRequest
{
    public function permission(): string
    {
        return Permission::ACTION_DATABASE_READ;
    }
}
