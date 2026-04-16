<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\Account\{
  ProfileController,
  PersonalController,
  ChangePasswordController,
};

Route::group(
  [
    'middleware' => [
      'auth',
      'submenu.access',
      'permission'
    ]
  ],
  function () {
    Route::get('/profile', [ProfileController::class, 'index'])
      ->name('profile');

    Route::get('/personal', [PersonalController::class, 'index'])
      ->name('personal');

    Route::get('/changepassword', [
      ChangePasswordController::class,
      'index'
    ])->name('changepassword');
  }
);
