<?php

namespace Neptune\Domains\Permissions\Models\Concerns;

use Illuminate\Support\Collection;

trait HasRoles
{
    public function getRoleField(): string
    {
        return 'roles_meta';
    }

    public function getRoles()
    {
        return collect(
            json_decode($this->getAttribute($this->getRoleField()), true)
        );
        // getRolesViaRoles
    //    $roles = new Collection();
    //    $this->getRoles()->each(function ($role) use (&$roles) {
    //      $roles = $roles->merge($role->permissions);
    //    });

    // getAllRoles = getRoles + getRolesViaRoles
    }

    public function roles()
    {
        $Role = config('neptune-permissions.models.role');

        return $Role::whereIn('slug', $this->getRoles());
    }

    public function hasRole(string $role): bool
    {
        return in_array($role, $this->getRoles()->toArray());
    }

    public function hasAllRoles(array $roles): bool
    {
        foreach ($roles as $role) {
            if (! $this->hasRole($role)) {
                return false;
            }
        }

        return true;
    }

    public function hasAnyRoles(array $roles): bool
    {
        foreach ($roles as $role) {
            if ($this->hasRole($role)) {
                return true;
            }
        }

        return false;
    }

    public function addRoles(array $roles)
    {
        $this->forceFill([
            $this->getRoleField() => $this->getRoles()->merge($roles)->values(),
        ]);
        $this->save();
    }

    public function removeRoles(array $roles)
    {
        $this->forceFill([
            $this->getRoleField() => $this->getRoles()->filter(fn ($p) => ! in_array($p, $roles))->values(),
        ]);
        $this->save();
    }

    public function syncRoles(array $roles)
    {
        $this->forceFill([
            $this->getRoleField() => $roles,
        ]);
        $this->save();
    }

    public function scopeRoles($query, array $roles)
    {
        $query->whereJsonContains($this->getRoleField(), $roles);
    }

    public function scopeRole($query, string $role)
    {
        $query->roles([$role]);
    }
}
