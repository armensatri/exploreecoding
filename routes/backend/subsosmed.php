<?php

use App\Http\Controllers\Backend\Account\SosmedController;
use Illuminate\Support\Facades\Route;

Route::group(
  [
    'middleware' => [
      'auth',
      'permission',
    ],
  ],
  function () {
    Route::controller(SosmedController::class)->group(
      function () {
        Route::get('/profile/sosmeds/{username}/edit', 'edit')
          ->name('sosmeds.edit');
        Route::patch('/profile/sosmeds/{username}', 'update')
          ->name('sosmeds.update');
      }
    );
  }
);
