<?php

namespace game\RPS;

use Illuminate\Support\ServiceProvider;

class RPSServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        // Load views
        $this->loadViewsFrom(__DIR__.'/resources/views', 'rps');

        // Publish configuration
        $this->publishes([
            __DIR__.'/config/rps.php' => config_path('rps.php'),
        ]);
    }

    public function register()
    {
        // Register package's configuration
        $this->mergeConfigFrom(__DIR__.'/config/rps.php', 'rps');
    }
}
