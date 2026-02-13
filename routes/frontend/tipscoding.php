<?php

use App\Http\Controllers\Frontend\Tipscoding\TipscodingController;
use Illuminate\Support\Facades\Route;

Route::controller(TipscodingController::class)->group(
  function () {
    Route::get('/ec/tipscoding', 'index')
      ->name('ec-tipscoding.index');
  }
);
