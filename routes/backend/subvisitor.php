<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Managedata\VisitorController;

Route::middleware(
  [
    'auth',
    'permission'
  ]
)->prefix('visitor')->name('visitor.')->controller(
  VisitorController::class
)->group(
  function () {
    Route::get('/banned', 'banned')->name('banned');
  }
);
