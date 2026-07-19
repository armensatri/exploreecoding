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

    Route::get('/ec/tipscoding/categories/{category:url}', 'category')
      ->name('ec-tipscodings.category');
    // ubah route view tipscoding dan category
    Route::get(
      '/ec/tipscoding/categories/{category:url}/tips/{tipscoding:url}',
      'show'
    )->name('ec-tipscoding.show');
  }
);

Route::controller(CategoryController::class)->group(
  function () {
    Route::get('/ec/tipscoding/categories', 'index')
      ->name('ec-categories.index');
  }
);
