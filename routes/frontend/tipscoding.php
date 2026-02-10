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
      ->name('ec-tipscoding.categori');
  }
);

Route::get('/ec/tipscoding/categori', [
  CategoryController::class,
  'index'
])->name('ec-categori.index');
