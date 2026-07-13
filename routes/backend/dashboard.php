<?php

use App\Http\Controllers\Backend\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(
  [
    'middleware' => [
      'auth',
      'submenu.access',
      'permission'
    ]
  ],
  function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
      ->name('dashboard');
  }
);
