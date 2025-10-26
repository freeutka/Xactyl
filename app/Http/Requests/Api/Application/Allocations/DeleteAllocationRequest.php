<?php

namespace Xactyl\Http\Requests\Api\Application\Allocations;

use Xactyl\Services\Acl\Api\AdminAcl;
use Xactyl\Http\Requests\Api\Application\ApplicationApiRequest;

class DeleteAllocationRequest extends ApplicationApiRequest
{
    protected ?string $resource = AdminAcl::RESOURCE_ALLOCATIONS;

    protected int $permission = AdminAcl::WRITE;
}
