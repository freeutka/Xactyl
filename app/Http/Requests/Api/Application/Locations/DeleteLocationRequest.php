<?php

namespace Xactyl\Http\Requests\Api\Application\Locations;

use Xactyl\Services\Acl\Api\AdminAcl;
use Xactyl\Http\Requests\Api\Application\ApplicationApiRequest;

class DeleteLocationRequest extends ApplicationApiRequest
{
    protected ?string $resource = AdminAcl::RESOURCE_LOCATIONS;

    protected int $permission = AdminAcl::WRITE;
}
