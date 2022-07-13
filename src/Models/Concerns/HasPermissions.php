<?php

namespace Neptune\Domains\Permissions\Models\Concerns;

use Illuminate\Support\Collection;

trait HasPermissions
{
    public function getPermissionField(): string
    {
        return config('neptune-permissions.permissions_field');
    }

    public function getPermissions()
    {
        $permissions = collect(
            json_decode($this->getAttribute($this->getPermissionField()), true)
        );

        if ($this instanceof \Neptune\Domains\Permissions\Contracts\Models\HasRoles) {
            $permissions = $this->roles()->get()->reduce(function ($carry, $role) {
                $carry = $carry->merge($role->getPermissions());

                return $carry;
            }, $permissions);
        }

        return $permissions;
        // getPermissionsViaRoles
//    $permissions = new Collection();
//    $this->getRoles()->each(function ($role) use (&$permissions) {
//      $permissions = $permissions->merge($role->permissions);
//    });

      // getAllPermissions = getPermissions + getPermissionsViaRoles
    }

    public function permissions()
    {
        $Permission = config('neptune-permissions.models.permission');

        return $Permission::whereIn('slug', $this->getPermissions());
    }

    public function hasPermission(string $permission): bool
    {
        return in_array($permission, $this->getPermissions()->toArray());
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
        $this->forceFill([
            $this->getPermissionField() => $this->getPermissions()->merge($permissions)->values(),
        ]);
        $this->save();
    }

    public function removePermissions(array $permissions)
    {
        $this->forceFill([
            $this->getPermissionField() => $this->getPermissions()->filter(fn ($p) => ! in_array($p, $permissions))->values(),
        ]);
        $this->save();
    }

    public function syncPermissions(array $permissions)
    {
        $this->forceFill([
            $this->getPermissionField() => $permissions,
        ]);
        $this->save();
    }
}
