<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Monitoring\PathviewController;
use App\Http\Controllers\Backend\Monitoring\TipscodingviewController;
use App\Http\Controllers\Backend\Monitoring\TipsreportController;
use App\Http\Controllers\Backend\Monitoring\UserregionController;

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

    Route::get('/monitoring/user-region', [
      UserregionController::class,
      'index'
    ])->name('monitoring.user-region');

    Route::controller(TipsreportController::class)->group(
      function () {
        Route::get('/monitoring/tipsreports', 'index')
          ->name('monitoring.tipsreports-index');
      }
    );
  }
);
