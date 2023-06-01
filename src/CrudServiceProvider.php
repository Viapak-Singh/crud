<?php

namespace Vip\Crud;

use Illuminate\Support\ServiceProvider;


class CrudServiceProvider extends ServiceProvider 
{

    public function boot()
    {
        // $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        // $this->loadViewsFrom(__DIR__.'/views', 'crud');
        // $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        // Custom Methods
        $this->loadAssets();
        $this->loadConfiguration();
        $this->callSilent('crud:generate');
        // $this->loadViews();
        // $this->loadControllers();
        // $this->loadRoutes();
    }

    public function register() 
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\VipCommand::class
            ]);
        }
    }

    private function loadAssets() {
        $this->publishes([
            __DIR__.'/public' => public_path('vendor/crud'),
        ], 'public');
    }

    private function loadConfiguration() {
        $this->mergeConfigFrom(
            __DIR__.'/config/crud.php', 'crud'
        );

        $this->publishes([
            __DIR__.'/config/crud.php' => config_path('crud.php'),
        ]);
    }

    private function loadViews() {
        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/crud'),
        ]);
    }

    private function loadControllers() {
        $this->publishes([
            __DIR__.'/Http/Controllers/CrudController.php' => app_path('Http/Controllers/CrudController.php'),
        ]);
    }

    private function loadRoutes() {
        $this->publishes([
            __DIR__.'/routes/web.php' => base_path('routes/web.php'),
        ]);
    }

}