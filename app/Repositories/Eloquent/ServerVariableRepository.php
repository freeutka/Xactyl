<?php

namespace Xactyl\Repositories\Eloquent;

use Xactyl\Models\ServerVariable;
use Xactyl\Contracts\Repository\ServerVariableRepositoryInterface;

class ServerVariableRepository extends EloquentRepository implements ServerVariableRepositoryInterface
{
    /**
     * Return the model backing this repository.
     */
    public function model(): string
    {
        return ServerVariable::class;
    }
}
