<?php

namespace Neptune\Domains\Permissions\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PermissionFactory extends Factory
{
    public function modelName()
    {
        return config('neptune-permissions.models.permission');
    }

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
        ];
    }
}
