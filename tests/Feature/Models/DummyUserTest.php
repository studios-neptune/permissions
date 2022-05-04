<?php

namespace Neptune\Domains\Permissions\Tests\Feature\Models;

use Neptune\Domains\Permissions\Tests\TestCase;
use Neptune\Domains\Permissions\Tests\Fixture\Models\DummyUser;
use Neptune\Domains\Permissions\Tests\Feature\Models\Concerns\HasPermissions;
use Neptune\Domains\Permissions\Tests\Fixture\Database\Migrations\CreateDummyUsersTable;

class DummyUserTest extends TestCase
{
    use HasPermissions;
    protected $model = DummyUser::class;

    protected function setUp(): void
    {
        parent::setUp();

        (new CreateDummyUsersTable())->up();
    }
}
