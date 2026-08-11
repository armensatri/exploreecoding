<?php

use App\Http\Controllers\Backend\View\ViewController;
use Illuminate\Support\Facades\Route;

Route::group(
  [
    'middleware' => [
      'auth',
      'permission',
    ],
  ],
  function () {
    Route::controller(ViewController::class)->group(
      function () {
        Route::get('/view/path', 'viewpath')->name('view.path');
        Route::get('/view/tipscoding', 'viewtipscoding')
          ->name('view.tipscoding');
      }
    );
  }
);
