<?php

use Illuminate\Support\Facades\Route;
use Neptune\Domains\Permissions\Http\Controllers\Role;
use Neptune\Domains\Permissions\Http\Controllers\RoleController;
use Neptune\Domains\Permissions\Http\Controllers\PermissionController;

Route::middleware('web')
    ->group(function () {
        Route::resource('/permission', PermissionController::class);

        Route::resource('role', RoleController::class);

        Route::put('/role/{role}/permission/bulk-update', [Role\PermissionController::class, 'bulkUpdate'])->name('role.permission.bulk-update');
    });
