<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\Tipscoding\{
  CategoryController,
  TipscodingController,
};

Route::controller(TipscodingController::class)->group(
  function () {
    Route::get('/ec/tipscoding', 'index')
      ->name('ec-tipscoding.index');

    Route::get('/ec/tipscoding/categori/{category:url}', 'category')
      ->name('ec-tipscoding.category');

    Route::get(
      '/ec/tipscoding/categori/{category:url}/tips/{tipscoding:url}',
      'show'
    )->name('ec-tipscoding.show');
  }
);

Route::controller(CategoryController::class)->group(
  function () {
    Route::get('/ec/tipscoding/categori', 'index')
      ->name('ec-categori.index');
  }
);
