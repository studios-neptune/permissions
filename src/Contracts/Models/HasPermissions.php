<?php

namespace Neptune\Domains\Permissions\Contracts\Models;

interface HasPermissions
{
    public function getPermissionField(): string;

    public function getPermissions();

    public function permissions();

    public function hasPermission(string $permission): bool;

    public function hasAllPermissions(array $permissions): bool;

    public function hasAnyPermissions(array $permissions): bool;

    public function addPermissions(array $permissions);

    public function removePermissions(array $permissions);

    public function syncPermissions(array $permissions);
}
