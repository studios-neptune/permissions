<?php

namespace Neptune\Domains\Permissions\Tests\Feature\Models;

use Neptune\Domains\Permissions\Tests\TestCase;
use Neptune\Domains\Permissions\Models\Permission;

class PermissionTest extends TestCase
{
    public function testModel()
    {
        $item = Permission::factory()->create();
        $table = config('neptune-permissions.table');
        $this->assertDatabaseHas($table, [
            'id' => $item->id,
            'name' => $item->name,
            'slug' => $item->slug,
        ]);
    }
}
