<?php

use App\Http\Controllers\Backend\Account\ChangePasswordController;
use Illuminate\Support\Facades\Route;

Route::group(
  [
    'middleware' => [
      'auth',
      'permission'
    ]
  ],
  function () {
    Route::controller(ChangePasswordController::class)->group(
      function () {
        Route::get('/changepassword/{url}/edit', 'edit')
          ->name('changepassword.edit');
        Route::patch('/changepassword/update', 'update')
          ->name('changepassword.update');
      }
    );
  }
);
