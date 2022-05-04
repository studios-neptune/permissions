<?php

namespace Neptune\Domains\Permissions\Tests\Feature\Models\Concerns;

use Illuminate\Testing\Assert;

trait HasPermissions
{
    public function testGetPermissions()
    {
        $Permission = config('neptune-permissions.models.permission');
        $permission = $Permission::factory()->create();

        $model = $this->model::factory()->create([
            'permissions_meta' => [
                $permission->slug,
            ],
        ]);
        $model->refresh();
        Assert::assertArraySubset([
            $permission->slug,
        ], $model->permissions_meta);
    }

    public function testAddPermissions()
    {
        $model = $this->model::factory()->create();
        $model->addPermissions(['user_delete']);

        $model->refresh();
        Assert::assertArraySubset([
            'user_delete',
        ], $model->permissions_meta);
    }
}
