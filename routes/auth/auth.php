<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\{
  LoginController,
  LogoutController,
  RegisterController,
};

Route::group(
  [
    'middleware' => [
      'guest'
    ]
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

Route::group(
  [
    'middleware' => [
      'auth'
    ]
  ],
  function () {
    Route::post('/auth/logout', [LogoutController::class, 'logout'])
      ->name('logout');
  }
);
