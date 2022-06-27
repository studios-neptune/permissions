<?php

namespace Neptune\Domains\Permissions\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Console\ConfirmableTrait;

class PermissionSeedCommand extends Command
{
    use ConfirmableTrait;

    protected $signature = 'permission:seed {--sync}';

    public function handle()
    {
        $Permission = config('neptune-permissions.models.permission');
        $data = config('neptune-permissions.permissions');

        if ($this->option('sync')) {
            Schema::disableForeignKeyConstraints();
            $Permission::truncate();

            foreach ($data as $group => $permissions) {
                foreach ($permissions as $slug => $name) {
                    $Permission::create([
                        'slug' => $slug,
                        'name' => $name,
                        'group' => ucfirst($group),
                    ]);
                }
            }
            Schema::enableForeignKeyConstraints();

            return self::SUCCESS;
        }

        foreach ($data as $group => $permissions) {
            foreach ($permissions as $slug => $name) {
                $Permission::updateOrCreate([
                    'slug' => $slug,
                ], [
                    'name' => $name,
                    'group' => ucfirst($group),
                ]);
            }
        }

        return self::SUCCESS;
    }
}
