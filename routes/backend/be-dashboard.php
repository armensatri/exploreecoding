<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Dashboard\OwnerController;
use App\Http\Controllers\Backend\Dashboard\SuperAdminController;

Route::group(
  [
    'middleware' => 'auth'
  ],
  function () {
    Route::get('/owner', [OwnerController::class, 'index'])
      ->name('owner');

    Route::get('/superadmin', [SuperAdminController::class, 'index'])
      ->name('superadmin');
  }
);
