<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::group(
  [
    'middleware' => [
      'guest',
    ],
  ],
  function () {
    Route::controller(LoginController::class)->group(
      function () {
        Route::get('/auth/login', 'index')
          ->name('login');
        Route::post('/auth/login', 'store')
          ->name('login.store');
      }
    );
  }
);
