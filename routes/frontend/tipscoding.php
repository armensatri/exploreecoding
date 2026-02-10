<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\Tipscoding\{
  TipscodingController,
};

Route::controller(TipscodingController::class)->group(
  function () {
    Route::get('/ec/tipscoding', 'index')
      ->name('ec-tipscoding.index');

    Route::get('/ec/tipscoding/category/{category:url}', 'category')
      ->name('ec-tipscoding.category');
  }
);
