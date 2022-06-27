<?php

namespace Neptune\Domains\Permissions\Contracts\Models;

interface HasRoles
{
    public function getRoleField(): string;

    public function getRoles();

    public function roles();

    public function hasRole(string $role): bool;

    public function hasAllRoles(array $roles): bool;

    public function hasAnyRoles(array $roles): bool;

    public function addRoles(array $roles);

    public function removeRoles(array $roles);

    public function syncRoles(array $roles);
}
