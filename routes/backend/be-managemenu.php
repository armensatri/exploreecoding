<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\Managemenu\MenusController;
use App\Http\Controllers\Backend\Managemenu\SubmenusController;

Route::group(
  [
    'middleware' => [
      'auth',
      'submenu_access'
    ]
  ],
  function () {
    Route::resources([
      '/menus' => MenusController::class,
      '/submenus' => SubmenusController::class,
    ]);
  }
);
