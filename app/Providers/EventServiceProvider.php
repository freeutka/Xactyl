<?php

namespace Xactyl\Providers;

use Xactyl\Models\User;
use Xactyl\Models\Server;
use Xactyl\Models\Subuser;
use Xactyl\Models\EggVariable;
use Xactyl\Observers\UserObserver;
use Xactyl\Observers\ServerObserver;
use Xactyl\Observers\SubuserObserver;
use Xactyl\Observers\EggVariableObserver;
use Xactyl\Listeners\Auth\AuthenticationListener;
use Xactyl\Events\Server\Installed as ServerInstalledEvent;
use Xactyl\Notifications\ServerInstalled as ServerInstalledNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     */
    protected $listen = [
        ServerInstalledEvent::class => [ServerInstalledNotification::class],
    ];

    protected $subscribe = [
        AuthenticationListener::class,
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        parent::boot();

        User::observe(UserObserver::class);
        Server::observe(ServerObserver::class);
        Subuser::observe(SubuserObserver::class);
        EggVariable::observe(EggVariableObserver::class);
    }
}
