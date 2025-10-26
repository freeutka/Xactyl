<?php

namespace Xactyl\Http\Requests\Api\Application\Servers\Databases;

use Xactyl\Services\Acl\Api\AdminAcl;

class ServerDatabaseWriteRequest extends GetServerDatabasesRequest
{
    protected int $permission = AdminAcl::WRITE;
}
