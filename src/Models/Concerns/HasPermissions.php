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
        return collect(
            json_decode($this->getAttribute('permissions_meta'), true)
        );
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
        $this->update([
            'permissions_meta' => $this->getPermissions()->merge($permissions)->values(),
        ]);
    }
}
