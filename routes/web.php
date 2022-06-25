<?php

use Illuminate\Support\Facades\Route;
use Neptune\Domains\Permissions\Http\Controllers\PermissionController;

Route::middleware('web')
    ->group(function () {
      Route::resource('/permission', PermissionController::class);
  });
