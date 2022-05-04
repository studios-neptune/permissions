<?php

namespace Neptune\Domains\Permissions\Commands;

use Illuminate\Console\Command;

class RolesSyncCommand extends Command
{
    public function handle()
    {
        return self::SUCCESS;
    }
}
