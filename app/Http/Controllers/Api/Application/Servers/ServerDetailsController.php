<?php

namespace Xactyl\Http\Controllers\Api\Application\Servers;

use Xactyl\Models\Server;
use Xactyl\Services\Servers\BuildModificationService;
use Xactyl\Services\Servers\DetailsModificationService;
use Xactyl\Transformers\Api\Application\ServerTransformer;
use Xactyl\Http\Controllers\Api\Application\ApplicationApiController;
use Xactyl\Http\Requests\Api\Application\Servers\UpdateServerDetailsRequest;
use Xactyl\Http\Requests\Api\Application\Servers\UpdateServerBuildConfigurationRequest;

class ServerDetailsController extends ApplicationApiController
{
    /**
     * ServerDetailsController constructor.
     */
    public function __construct(
        private BuildModificationService $buildModificationService,
        private DetailsModificationService $detailsModificationService
    ) {
        parent::__construct();
    }

    /**
     * Update the details for a specific server.
     *
     * @throws \Xactyl\Exceptions\DisplayException
     * @throws \Xactyl\Exceptions\Model\DataValidationException
     * @throws \Xactyl\Exceptions\Repository\RecordNotFoundException
     */
    public function details(UpdateServerDetailsRequest $request, Server $server): array
    {
        $updated = $this->detailsModificationService->returnUpdatedModel()->handle(
            $server,
            $request->validated()
        );

        return $this->fractal->item($updated)
            ->transformWith($this->getTransformer(ServerTransformer::class))
            ->toArray();
    }

    /**
     * Update the build details for a specific server.
     *
     * @throws \Xactyl\Exceptions\DisplayException
     * @throws \Xactyl\Exceptions\Model\DataValidationException
     * @throws \Xactyl\Exceptions\Repository\RecordNotFoundException
     */
    public function build(UpdateServerBuildConfigurationRequest $request, Server $server): array
    {
        $server = $this->buildModificationService->handle($server, $request->validated());

        return $this->fractal->item($server)
            ->transformWith($this->getTransformer(ServerTransformer::class))
            ->toArray();
    }
}
