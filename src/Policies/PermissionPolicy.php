<?php

namespace Neptune\Domains\Permissions\Policies;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Access\HandlesAuthorization;
use Neptune\Domains\Permissions\Models\Permission;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function before(Authenticatable $user, $a)
    {
        dd($user, $a);
    }

    public function create(Authenticatable $user): bool
    {
        return true;
    }

    public function viewAny(Authenticatable $user): bool
    {
        return true;
    }

    public function view(Authenticatable $user, Permission $permission): bool
    {
        return true;
    }

    public function update(Authenticatable $user, Permission $permission): bool
    {
        return true;
    }

    public function delete(Authenticatable $user, Permission $permission): bool
    {
        return true;
    }
}
