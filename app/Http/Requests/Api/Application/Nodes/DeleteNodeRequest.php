<?php

namespace Xactyl\Http\Requests\Api\Application\Nodes;

use Xactyl\Services\Acl\Api\AdminAcl;
use Xactyl\Http\Requests\Api\Application\ApplicationApiRequest;

class DeleteNodeRequest extends ApplicationApiRequest
{
    protected ?string $resource = AdminAcl::RESOURCE_NODES;

    protected int $permission = AdminAcl::WRITE;
}
