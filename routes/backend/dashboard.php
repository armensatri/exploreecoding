<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\Dashboard\{
  OwnerController,
  SuperadminController,
  CreatorController,
  MemberController,
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
    Route::get('/owner', [OwnerController::class, 'index'])
      ->name('owner');

    Route::get('/superadmin', [SuperadminController::class, 'index'])
      ->name('superadmin');

    Route::get('/creator', [CreatorController::class, 'index'])
      ->name('creator');

    Route::get('/member', [MemberController::class, 'index'])
      ->name('member');
  }
);
