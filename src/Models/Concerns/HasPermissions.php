<?php

namespace Neptune\Domains\Permissions\Models\Concerns;

use Illuminate\Support\Collection;

// TODO add interface
// addPermissions
// removePermissions
trait HasPermissions
{
    public function getPermissions()
    {
        return $this->permissions_meta;
//    $permissions = new Collection();
//    $this->getRoles()->each(function ($role) use (&$permissions) {
//      $permissions = $permissions->merge($role->permissions);
//    });
//    $permissions = $allPermissionKeys->intersect($permissions);
    }

    public function hasPermission(string $permission): bool
    {
        return collect($this->getPermissions())
            ->has($permission);
    }

    public function hasAllPermissions(array $permissions): bool
    {
        foreach ($permissions as $permission) {
            if (! $this->hasPermission($permission)) {
                return false;
            }
        }

        return true;
    }

    public function hasAnyPermissions(array $permissions): bool
    {
        foreach ($permissions as $permission) {
            if ($this->hasPermission($permission)) {
                return true;
            }
        }

        return false;
    }

    public function addPermissions(array $permissions)
    {
        $this->update([
            'permissions_meta' => collect($this->getPermissions())->merge($permissions)->values(),
        ]);
    }
}
