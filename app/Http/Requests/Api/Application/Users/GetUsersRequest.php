<?php

namespace Xactyl\Http\Requests\Api\Application\Users;

use Xactyl\Services\Acl\Api\AdminAcl as Acl;
use Xactyl\Http\Requests\Api\Application\ApplicationApiRequest;

class GetUsersRequest extends ApplicationApiRequest
{
    protected ?string $resource = Acl::RESOURCE_USERS;

    protected int $permission = Acl::READ;
}
