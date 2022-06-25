<?php

namespace Neptune\Domains\Permissions\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Neptune\Domains\Permissions\Commands\PermissionSyncCommand;

class PermissionsServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/neptune-permissions.php' => config_path('neptune-permissions.php'),
        ], 'neptune-permissions:config');
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/neptune-permissions.php',
            'neptune-permissions'
        );
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->publishes([
            __DIR__ . '/../../database/migrations/' => database_path('migrations'),
        ], 'neptune-permissions:migrations');

        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        //
        //    $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'package-lang');
        //    $this->publishes([
        //      __DIR__.'/../resources/lang' => resource_path('lang/vendor/package'),
        //    ]);
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'cerberus');
        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/cerberus'),
        ]);
        Blade::componentNamespace('Neptune\\Domains\\Permissions\\Views\\Components', 'cerberus');

        $this->registerPolicies();

        if ($this->app->runningInConsole()) {
            $this->commands([
                PermissionSyncCommand::class,
            ]);
        }
        //    $this->publishes([
    //      __DIR__.'/../public' => public_path('vendor/package'),
    //    ], 'public');
    }

    protected function registerPolicies()
    {
        $this->crud('permission', config('neptune-permissions.policies.permission'));
    }

    // TODO: extract to laravel-core
    protected function crud(string $prefix, $class)
    {
        Gate::define("${prefix}.create", [$class, 'create']);
        Gate::define("${prefix}.viewAny", [$class, 'viewAny']);
        Gate::define("${prefix}.view", [$class, 'view']);
        Gate::define("${prefix}.update", [$class, 'update']);
        Gate::define("${prefix}.delete", [$class, 'delete']);
    }
}
