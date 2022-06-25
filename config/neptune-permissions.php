<?php

use Neptune\Domains\Permissions\Models\Permission;
use Neptune\Domains\Permissions\Policies\PermissionPolicy;

return [
    'models' => [
        'user' => '\App\Models\User',
        'permission' => Permission::class,
    ],
    'policies' => [
        'permission' => PermissionPolicy::class,
    ],
    'requests' => [
        'permission' => [
            'store' => \Neptune\Domains\Permissions\Requests\Permission\StoreRequest::class,
            'update' => \Neptune\Domains\Permissions\Requests\Permission\UpdateRequest::class,
        ],
        'entity' => [
            'permission' => [
                'store' => \Neptune\Domains\Permissions\Requests\Permission\StoreRequest::class,
                'update' => \Neptune\Domains\Permissions\Requests\Permission\UpdateRequest::class,
            ],
        ],
    ],
    'has_roles' => true,
    'permissions_table' => 'permissions',
    'roles_table' => 'roles',
    // not at root level to allow customization config
    'permissions' => [
        'User' => [
            'user_create' => 'Can create user',
            'user_update' => 'Can update user',
            'user_delete' => 'Can delete user',
            'user_view_any' => 'Can view any user',
            'user_view' => 'Can view user',
        ],
    ],
    // not at root level to allow customization config
    'roles' => [
        'basic' => [
            'user_create',
            'user_update',
        ],
    ],
];
