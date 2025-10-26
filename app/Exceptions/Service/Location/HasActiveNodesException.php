<?php

namespace Xactyl\Exceptions\Service\Location;

use Illuminate\Http\Response;
use Xactyl\Exceptions\DisplayException;

class HasActiveNodesException extends DisplayException
{
    public function getStatusCode(): int
    {
        return Response::HTTP_BAD_REQUEST;
    }
}
