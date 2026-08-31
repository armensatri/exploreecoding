<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Monitoring\PathviewController;
use App\Http\Controllers\Backend\Monitoring\TipscodingviewController;

Route::group(
  [
    'middleware' => [
      'auth',
      'permission',
    ],
  ],
  function () {
    Route::get('/monitoring/path-view', [
      PathviewController::class,
      'index'
    ])->name('monitoring.path-view');

    Route::get('/monitoring/tipscoding-view', [
      TipscodingviewController::class,
      'index'
    ])->name('monitoring.tipscoding-view');
  }
);
