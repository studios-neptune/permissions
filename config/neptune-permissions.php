<?php

use Neptune\Domains\Permissions\Models\Role;
use Neptune\Domains\Permissions\Models\Permission;
use Neptune\Domains\Permissions\Policies\PermissionPolicy;

return [
    'models' => [
        'user' => '\App\Models\User',
        'permission' => Permission::class,
        'role' => Role::class,
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
                'update' => \Neptune\Domains\Permissions\Requests\Entity\Permission\UpdateRequest::class,
            ],
            'role' => [
                'update' => \Neptune\Domains\Permissions\Requests\Entity\Role\UpdateRequest::class,
            ],
        ],
    ],
    'has_roles' => true,
    'permissions_table' => 'permissions',
    'roles_table' => 'roles',
    // can be overridden at the model level
    'permissions_field' => 'permissions_meta',
    // can be overridden at the model level
    'roles_field' => 'roles_meta',
    // not at root level to allow customization config
    'permissions' => [
        'User' => [
            'user_create' => 'Can create user',
            'user_update' => 'Can update user',
            'user_delete' => 'Can delete user',
            'user_view_any' => 'Can view any user',
            'user_view' => 'Can view user',
        ],
        'Permissions' => [
            // replace entity with actual model (ie user)
            'entity.permission.view_any' => 'Can view entity permission',
        ],
    ],
    // not at root level to allow customization config
    'roles' => [
        [
            'name' => 'Basic',
            'slug' => 'basic',
            'permissions' => [
                'user_create',
                'user_update',
            ],
        ],
    ],
];
