<?php

namespace Neptune\Domains\Permissions\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Console\ConfirmableTrait;

class RoleSeedCommand extends Command
{
    use ConfirmableTrait;

    protected $signature = 'role:seed {--sync}';

    public function handle()
    {
        $Role = config('neptune-permissions.models.role');
        $roles = config('neptune-permissions.roles');

        if ($this->option('sync')) {
            Schema::disableForeignKeyConstraints();
            $Role::truncate();

            foreach ($roles as $role) {
                $Role::create([
                    'slug' => $role['slug'],
                    'name' => $role['name'],
                    'permissions_meta' => json_encode($role['permissions']),
                ]);
            }
            Schema::enableForeignKeyConstraints();

            return self::SUCCESS;
        }

        foreach ($roles as $role) {
            $Role::updateOrCreate([
                'slug' => $role['slug'],
            ], [
                'name' => $role['name'],
                'permissions_meta' => json_encode($role['permissions']),
            ]);
        }

        return self::SUCCESS;
    }
}
