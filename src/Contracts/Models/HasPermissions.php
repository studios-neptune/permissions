<?php

namespace Neptune\Domains\Permissions\Contracts\Models;

interface HasPermissions
{
    public function getPermissions();

    public function permissions();

    public function hasPermission(string $permission): bool;

    public function hasAllPermissions(array $permissions): bool;

    public function hasAnyPermissions(array $permissions): bool;

    public function addPermissions(array $permissions);
}
