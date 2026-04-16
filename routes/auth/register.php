<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;

Route::group(
  [
    'middleware' => [
      'guest'
    ]
  ],
  function () {
    Route::controller(RegisterController::class)->group(
      function () {
        Route::get('/auth/register', 'index')
          ->name('register');
        Route::post('/auth/register', 'store')
          ->name('register.store');
      }
    );
  }
);
