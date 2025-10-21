<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\Dashboard\{
  OwnerController,
  SuperadminController,
  AdminController,
  WritingController,
  EditorController,
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

    Route::get('/admin', [AdminController::class, 'index'])
      ->name('admin');

    Route::get('/writing', [WritingController::class, 'index'])
      ->name('writing');

    Route::get('/editor', [EditorController::class, 'index'])
      ->name('editor');

    Route::get('/member', [MemberController::class, 'index'])
      ->name('member');
  }
);
