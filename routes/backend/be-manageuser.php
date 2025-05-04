<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Manageuser\UsersController;

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
    ]);
  }
);
