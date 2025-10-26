<?php

namespace Xactyl\Exceptions\Service;

use Illuminate\Http\Response;
use Xactyl\Exceptions\DisplayException;

class HasActiveServersException extends DisplayException
{
    public function getStatusCode(): int
    {
        return Response::HTTP_BAD_REQUEST;
    }
}
