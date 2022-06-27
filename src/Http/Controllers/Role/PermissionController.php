<?php

namespace Neptune\Domains\Permissions\Http\Controllers\Role;

use Neptune\Domains\Permissions\Http\Controllers\Controller;
use Neptune\Domains\Permissions\Http\Controllers\Entity\HasPermissions;

class PermissionController extends Controller
{
    use HasPermissions;

    public function entity(): string
    {
        return config('neptune-permission.models.role');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
