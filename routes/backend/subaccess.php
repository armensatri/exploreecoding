<?php

use App\Http\Controllers\Backend\Manageaccess\RoleAccessMenuController;
use App\Http\Controllers\Backend\Manageaccess\RoleAccessPermissionController;
use App\Http\Controllers\Backend\Manageaccess\RoleAccessSubmenuController;
use Illuminate\Support\Facades\Route;

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
          '/access/menu/{slug}',
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
          '/access/submenu/{slug}',
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
          '/access/permission/{slug}',
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
