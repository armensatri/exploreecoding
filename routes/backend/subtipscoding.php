<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Tipscoding\TipsreportController;


Route::group(
  [
    'middleware' => [
      'auth',
      'submenu.access',
      'permission',
    ],
  ],
  function () {
    Route::get(
      '/tipsreports',
      [TipsreportController::class, 'index']
    )->name('tipsreports.index');

    Route::get(
      '/tipsreports/{report}',
      [TipsreportController::class, 'show']
    )->name('tipsreports.show');

    Route::patch(
      '/tipsreports/{report}/resolve',
      [TipsreportController::class, 'resolve']
    )->name('tipsreports.resolve');

    Route::patch(
      '/tipsreports/{report}/reject',
      [TipsreportController::class, 'reject']
    )->name('tipsreports.reject');
  }
);
