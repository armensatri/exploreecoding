<?php

use App\Http\Controllers\Backend\Managedata\AccessController;
use App\Http\Controllers\Backend\Managedata\DataController;
use App\Http\Controllers\Backend\Managedata\StatisticController;
use App\Http\Controllers\Backend\Managedata\VisitorController;
use Illuminate\Support\Facades\Route;

Route::group(
  [
    'middleware' => [
      'auth',
      'submenu.access',
      'permission',
    ],
  ],
  function () {
    Route::get('/data', [DataController::class, 'index'])
      ->name('data');

    Route::get('/visitor', [VisitorController::class, 'index'])
      ->name('visitor');

    Route::get('/access', [AccessController::class, 'index'])
      ->name('access');

    Route::get('/statistic', [StatisticController::class, 'index'])
      ->name('statistic');
  }
);
