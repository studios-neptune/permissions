<?php

namespace Neptune\Domains\Permissions\Providers;

use Illuminate\Support\ServiceProvider;

class PermissionsServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/neptune-permissions.php' => config_path('neptune-permissions.php'),
        ], 'neptune-permissions-config');
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/neptune-permissions.php',
            'neptune-permissions'
        );
        //    $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        //
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->publishes([
            __DIR__ . '/../../database/migrations/' => database_path('migrations'),
        ], 'neptune-permissions-migrations');

        //
    //    $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'package-lang');
    //    $this->publishes([
    //      __DIR__.'/../resources/lang' => resource_path('lang/vendor/package'),
    //    ]);
    //    $this->loadViewsFrom(__DIR__.'/../resources/views', 'package-views');
    //    $this->publishes([
    //      __DIR__.'/../resources/views' => resource_path('views/vendor/package'),
    //    ]);
    //    if ($this->app->runningInConsole()) {
    //      $this->commands([
    //        InstallCommand::class,
    //      ]);
    //    }
    //    $this->publishes([
    //      __DIR__.'/../public' => public_path('vendor/package'),
    //    ], 'public');
    }
}
