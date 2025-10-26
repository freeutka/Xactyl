<?php

namespace Xactyl\Providers;

use Illuminate\Support\ServiceProvider;
use Xactyl\Repositories\Eloquent\EggRepository;
use Xactyl\Repositories\Eloquent\NestRepository;
use Xactyl\Repositories\Eloquent\NodeRepository;
use Xactyl\Repositories\Eloquent\TaskRepository;
use Xactyl\Repositories\Eloquent\UserRepository;
use Xactyl\Repositories\Eloquent\ApiKeyRepository;
use Xactyl\Repositories\Eloquent\ServerRepository;
use Xactyl\Repositories\Eloquent\SessionRepository;
use Xactyl\Repositories\Eloquent\SubuserRepository;
use Xactyl\Repositories\Eloquent\DatabaseRepository;
use Xactyl\Repositories\Eloquent\LocationRepository;
use Xactyl\Repositories\Eloquent\ScheduleRepository;
use Xactyl\Repositories\Eloquent\SettingsRepository;
use Xactyl\Repositories\Eloquent\AllocationRepository;
use Xactyl\Contracts\Repository\EggRepositoryInterface;
use Xactyl\Repositories\Eloquent\EggVariableRepository;
use Xactyl\Contracts\Repository\NestRepositoryInterface;
use Xactyl\Contracts\Repository\NodeRepositoryInterface;
use Xactyl\Contracts\Repository\TaskRepositoryInterface;
use Xactyl\Contracts\Repository\UserRepositoryInterface;
use Xactyl\Repositories\Eloquent\DatabaseHostRepository;
use Xactyl\Contracts\Repository\ApiKeyRepositoryInterface;
use Xactyl\Contracts\Repository\ServerRepositoryInterface;
use Xactyl\Repositories\Eloquent\ServerVariableRepository;
use Xactyl\Contracts\Repository\SessionRepositoryInterface;
use Xactyl\Contracts\Repository\SubuserRepositoryInterface;
use Xactyl\Contracts\Repository\DatabaseRepositoryInterface;
use Xactyl\Contracts\Repository\LocationRepositoryInterface;
use Xactyl\Contracts\Repository\ScheduleRepositoryInterface;
use Xactyl\Contracts\Repository\SettingsRepositoryInterface;
use Xactyl\Contracts\Repository\AllocationRepositoryInterface;
use Xactyl\Contracts\Repository\EggVariableRepositoryInterface;
use Xactyl\Contracts\Repository\DatabaseHostRepositoryInterface;
use Xactyl\Contracts\Repository\ServerVariableRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register all the repository bindings.
     */
    public function register(): void
    {
        // Eloquent Repositories
        $this->app->bind(AllocationRepositoryInterface::class, AllocationRepository::class);
        $this->app->bind(ApiKeyRepositoryInterface::class, ApiKeyRepository::class);
        $this->app->bind(DatabaseRepositoryInterface::class, DatabaseRepository::class);
        $this->app->bind(DatabaseHostRepositoryInterface::class, DatabaseHostRepository::class);
        $this->app->bind(EggRepositoryInterface::class, EggRepository::class);
        $this->app->bind(EggVariableRepositoryInterface::class, EggVariableRepository::class);
        $this->app->bind(LocationRepositoryInterface::class, LocationRepository::class);
        $this->app->bind(NestRepositoryInterface::class, NestRepository::class);
        $this->app->bind(NodeRepositoryInterface::class, NodeRepository::class);
        $this->app->bind(ScheduleRepositoryInterface::class, ScheduleRepository::class);
        $this->app->bind(ServerRepositoryInterface::class, ServerRepository::class);
        $this->app->bind(ServerVariableRepositoryInterface::class, ServerVariableRepository::class);
        $this->app->bind(SessionRepositoryInterface::class, SessionRepository::class);
        $this->app->bind(SettingsRepositoryInterface::class, SettingsRepository::class);
        $this->app->bind(SubuserRepositoryInterface::class, SubuserRepository::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
