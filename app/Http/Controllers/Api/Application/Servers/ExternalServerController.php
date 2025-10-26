<?php

namespace Xactyl\Http\Controllers\Api\Application\Servers;

use Xactyl\Models\Server;
use Xactyl\Transformers\Api\Application\ServerTransformer;
use Xactyl\Http\Controllers\Api\Application\ApplicationApiController;
use Xactyl\Http\Requests\Api\Application\Servers\GetExternalServerRequest;

class ExternalServerController extends ApplicationApiController
{
    /**
     * Retrieve a specific server from the database using its external ID.
     */
    public function index(GetExternalServerRequest $request, string $external_id): array
    {
        $server = Server::query()->where('external_id', $external_id)->firstOrFail();

        return $this->fractal->item($server)
            ->transformWith($this->getTransformer(ServerTransformer::class))
            ->toArray();
    }
}
