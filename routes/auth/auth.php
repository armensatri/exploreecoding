<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

Route::group(
  [
    'middleware' => ['guest']
  ],
  function () {
    Route::controller(LoginController::class)->group(
      function () {
        Route::get('/auth/login', 'index')->name('login');
        Route::post('/auth/login', 'store')->name('login.store')
          ->middleware('throttle:login');;
      }
    );

    Route::controller(RegisterController::class)->group(
      function () {
        Route::get('/auth/register', 'index')->name('register');
        Route::post('/auth/register', 'store')->name('register.store')
          ->middleware('throttle:register');;
      }
    );
  }
);

Route::group(
  [
    'middleware' => 'auth'
  ],
  function () {
    Route::post('/auth/logout', [LogoutController::class, 'logout'])
      ->name('auth.logout');
  }
);
