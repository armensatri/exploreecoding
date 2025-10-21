<?php

use App\Http\Controllers\Backend\Account\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group(
  [
    'middleware' => [
      'auth',
      'permission'
    ]
  ],
  function () {
    Route::controller(ProfileController::class)->group(
      function () {
        Route::get('/profile/{url}/edit', 'edit')
          ->name('profile.edit');
        Route::patch('/profile/update', 'update')
          ->name('profile.update');
      }
    );
  }
);
