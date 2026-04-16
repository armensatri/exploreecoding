<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LogoutController;

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
