<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Dashboard\OwnerController;
use App\Http\Controllers\Backend\Dashboard\SuperAdminController;
use App\Http\Controllers\Backend\Dashboard\AdminController;
use App\Http\Controllers\Backend\Dashboard\ContentCreatorController;
use App\Http\Controllers\Backend\Dashboard\MemberController;

Route::group(
  [
    'middleware' => [
      'auth',
    ]
  ],
  function () {
    Route::get('/owner', [OwnerController::class, 'index'])
      ->name('owner');

    Route::get('/superadmin', [SuperAdminController::class, 'index'])
      ->name('superadmin');

    Route::get('/admin', [AdminController::class, 'index'])
      ->name('admin');

    Route::get('/concreat', [ContentCreatorController::class, 'index'])
      ->name('concreat');

    Route::get('/member', [MemberController::class, 'index'])
      ->name('member');
  }
);
