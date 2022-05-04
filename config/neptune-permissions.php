<?php

use Neptune\Domains\Permissions\Models\Permission;

return [
    'models' => [
        'user' => '\App\Models\User',
        'permission' => Permission::class,
    ],
    'table' => 'permissions',
    // not at root level to allow customization config
    'permissions' => [
        'user_create',
        'user_update',
        'user_delete',
        'user_view_any',
        'user_view',
    ],
    // not at root level to allow customization config
    'roles' => [
      'basic' => [
        'user_create',
        'user_update',
      ],
    ],
];
