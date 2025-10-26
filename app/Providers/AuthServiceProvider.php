<?php

namespace Xactyl\Providers;

use Laravel\Sanctum\Sanctum;
use Xactyl\Models\ApiKey;
use Xactyl\Models\Server;
use Xactyl\Policies\ServerPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     */
    protected $policies = [
        Server::class => ServerPolicy::class,
    ];

    public function boot(): void
    {
        Sanctum::usePersonalAccessTokenModel(ApiKey::class);
    }

    public function register(): void
    {
        Sanctum::ignoreMigrations();
    }
}
