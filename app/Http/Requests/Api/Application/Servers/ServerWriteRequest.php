<?php

namespace Xactyl\Http\Requests\Api\Application\Servers;

use Xactyl\Services\Acl\Api\AdminAcl;
use Xactyl\Http\Requests\Api\Application\ApplicationApiRequest;

class ServerWriteRequest extends ApplicationApiRequest
{
    protected ?string $resource = AdminAcl::RESOURCE_SERVERS;

    protected int $permission = AdminAcl::WRITE;
}
