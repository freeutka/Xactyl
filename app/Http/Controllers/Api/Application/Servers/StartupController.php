<?php

namespace Xactyl\Http\Controllers\Api\Application\Servers;

use Xactyl\Models\User;
use Xactyl\Models\Server;
use Xactyl\Services\Servers\StartupModificationService;
use Xactyl\Transformers\Api\Application\ServerTransformer;
use Xactyl\Http\Controllers\Api\Application\ApplicationApiController;
use Xactyl\Http\Requests\Api\Application\Servers\UpdateServerStartupRequest;

class StartupController extends ApplicationApiController
{
    /**
     * StartupController constructor.
     */
    public function __construct(private StartupModificationService $modificationService)
    {
        parent::__construct();
    }

    /**
     * Update the startup and environment settings for a specific server.
     *
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Xactyl\Exceptions\Http\Connection\DaemonConnectionException
     * @throws \Xactyl\Exceptions\Model\DataValidationException
     * @throws \Xactyl\Exceptions\Repository\RecordNotFoundException
     */
    public function index(UpdateServerStartupRequest $request, Server $server): array
    {
        $server = $this->modificationService
            ->setUserLevel(User::USER_LEVEL_ADMIN)
            ->handle($server, $request->validated());

        return $this->fractal->item($server)
            ->transformWith($this->getTransformer(ServerTransformer::class))
            ->toArray();
    }
}
