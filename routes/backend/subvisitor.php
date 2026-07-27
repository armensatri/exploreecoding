<?php

use App\Http\Controllers\Backend\Managedata\VisitorController;
use Illuminate\Support\Facades\Route;

Route::middleware(
  [
    'auth',
    'permission',
  ]
)->prefix('visitor')->name('visitor.')->controller(
  VisitorController::class
)->group(
  function () {
    Route::get('/banned', 'banned')->name('banned');
  }
);
