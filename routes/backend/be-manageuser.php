<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\Manageuser\{
  UsersController,
  RolesController,
  PermissionsController,
};

Route::group(
  [
    'middleware' => [
      'auth',
    ]
  ],
  function () {
    Route::get('/roles/slug', [RolesController::class, 'slug']);
  }
);

Route::group(
  [
    'middleware' => [
      'auth',
      'submenu_access'
    ]
  ],
  function () {
    Route::resources([
      '/users' => UsersController::class,
      '/roles' => RolesController::class,
      '/permissions' => PermissionsController::class,
    ]);
  }
);
