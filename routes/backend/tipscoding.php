<?php

use App\Http\Controllers\Backend\Tipscoding\CategoriesController;
use App\Http\Controllers\Backend\Tipscoding\TipscodingsController;
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
    Route::resources([
      '/tipscodings' => TipscodingsController::class,
      '/categories' => CategoriesController::class,
    ]);
  }
);
