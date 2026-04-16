<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\Tipscoding\{
  TipscodingsController,
  CategoriesController,
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
    Route::resources([
      '/tipscodings' => TipscodingsController::class,
      '/categories' => CategoriesController::class
    ]);
  }
);
