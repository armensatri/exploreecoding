<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\Tipscoding\{
  CategoryController,
  TipscodingController,
};

Route::controller(TipscodingController::class)->group(
  function () {
    Route::get('/ec/tipscodings', 'index')
      ->name('ec-tipscodings.index');

    Route::get('/ec/tipscodings/category/{category:slug}', 'category')
      ->name('ec-tipscodings.category');

    Route::get(
      '/ec/tipscodings/category/{category:slug}/tips/{tipscoding:slug}',
      'show'
    )->name('ec-tipscodings.show');
  }
);

Route::controller(CategoryController::class)->group(
  function () {
    Route::get('/ec/tipscoding/categories', 'index')
      ->name('ec-categories.index');
  }
);
