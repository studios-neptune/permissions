<?php

namespace Neptune\Domains\Permissions\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    public function modelName()
    {
        return config('neptune-permissions.models.role');
    }

    public function definition(): array
    {
        $Permission = config('neptune-permissions.models.permission');

        return [
            'name' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'permissions' => fn () => $Permission::inRandomOrder()->take(mt_rand(1, 10)->pluck('slug')),
        ];
    }
}
