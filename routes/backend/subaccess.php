<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\Manageaccess\{
  RoleAccessMenuController,
  RoleAccessSubmenuController,
  RoleAccessPermissionController,
};

Route::group(
  [
    'middleware' => [
      'auth',
      'permission',
    ],
  ],
  function () {
    Route::controller(RoleAccessMenuController::class)->group(
      function () {
        Route::get(
          '/access/menu/{url}',
          'accessMenu'
        )->name('access.menu');

        Route::post(
          '/access/menu',
          'accessUpMenu'
        )->name('access.up.menu');
      }
    );

    Route::controller(RoleAccessSubmenuController::class)->group(
      function () {
        Route::get(
          '/access/submenu/{url}',
          'accessSubmenu'
        )->name('access.submenu');

        Route::post(
          '/access/submenu',
          'accessUpSubmenu'
        )->name('access.up.submenu');
      }
    );

    Route::controller(RoleAccessPermissionController::class)->group(
      function () {
        Route::get(
          '/access/permission/{url}',
          'accessPermission'
        )->name('access.permission');

        Route::post(
          '/access/permission',
          'accessUpPermission'
        )->name('access.up.permission');
      }
    );
  }
);
