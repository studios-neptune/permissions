<?php

namespace Neptune\Domains\Permissions\Tests\Fixture\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Neptune\Domains\Permissions\Tests\Fixture\Models\DummyUser;

class DummyUserFactory extends Factory
{
    protected $model = DummyUser::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'permissions_meta' => ['dummy_perm'],
        ];
    }
}
