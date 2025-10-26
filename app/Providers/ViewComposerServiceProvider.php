<?php

namespace Xactyl\Providers;

use Illuminate\Support\ServiceProvider;
use Xactyl\Http\ViewComposers\AssetComposer;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     */
    public function boot(): void
    {
        $this->app->make('view')->composer('*', AssetComposer::class);
    }
}
