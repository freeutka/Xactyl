<?php

namespace Xactyl\Http\Requests\Api\Application\Nests\Eggs;

use Xactyl\Services\Acl\Api\AdminAcl;
use Xactyl\Http\Requests\Api\Application\ApplicationApiRequest;

class GetEggsRequest extends ApplicationApiRequest
{
    protected ?string $resource = AdminAcl::RESOURCE_EGGS;

    protected int $permission = AdminAcl::READ;
}
