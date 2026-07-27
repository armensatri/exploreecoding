<?php

use App\Http\Controllers\Backend\Manageuser\PermissionsController;
use App\Http\Controllers\Backend\Manageuser\RolesController;
use App\Http\Controllers\Backend\Manageuser\UsersController;
use Illuminate\Support\Facades\Route;

Route::group(
  [
    'middleware' => [
      'auth',
    ],
  ],
  function () {
    Route::get('/roles/slug', [RolesController::class, 'slug']);
    Route::get('/permissions/slug', [
      PermissionsController::class,
      'slug',
    ]);
  }
);

Route::group(
  [
    'middleware' => [
      'auth',
      'submenu.access',
      'permission',
    ],
  ],
  function () {
    Route::resources([
      '/users' => UsersController::class,
      '/roles' => RolesController::class,
      '/permissions' => PermissionsController::class,
    ]);
  }
);

Route::group(
  [
    'middleware' => [
      'auth',
      'permission',
    ],
  ],
  function () {
    Route::get('/users/{username}/{status}', [
      UsersController::class,
      'changestatus',
    ])->name('users.change.status');
  }
);
