<?php

namespace Neptune\Domains\Permissions\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Console\ConfirmableTrait;

class PermissionSyncCommand extends Command
{
    use ConfirmableTrait;

    protected $signature = 'permission:sync';

    protected function getModel()
    {
        return config('neptune-permissions.models.permission');
    }

    public function handle()
    {
        // TODO maybe not truncate but create then remove anything not in created slugs
        Schema::disableForeignKeyConstraints();
        $this->getModel()::truncate();
        $data = config('neptune-permissions.permissions');

        foreach ($data as $group => $permissions) {
            foreach ($permissions as $slug => $name) {
                $this->getModel()::create([
                    'name' => $name,
                    'group' => ucfirst($group),
                    'slug' => $slug,
                ]);
            }
        }

        return self::SUCCESS;
    }
}
