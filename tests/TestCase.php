<?php

namespace Neptune\Domains\Permissions\Tests;

use Dotenv\Dotenv;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Neptune\Domains\Permissions\Providers\PermissionsServiceProvider;

class TestCase extends BaseTestCase
{
    use LazilyRefreshDatabase;

    protected function getPackageProviders($app): array
    {
        return [
            PermissionsServiceProvider::class,
        ];
    }

    protected function defineDatabaseMigrationsAfterDatabaseRefreshed()
    {
        $this->loadMigrationsFrom(__DIR__ . '/Fixture/Database/Migrations');
    }

    protected function defineEnvironment($app)
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../', '.env.testing');
        $dotenv->load();
        $dotenv->required([
            'DB_CONNECTION',
            'DB_HOST',
            'DB_DATABASE',
            'DB_USERNAME',
            'DB_PASSWORD',
        ]);

        $app['config']->set('database.default', env('DB_CONNECTION', 'mysql'));
        $app['config']->set('database.connections.mysql', [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'test'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
        ]);
    }
}
