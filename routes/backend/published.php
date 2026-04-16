<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Published\StatusesController;

Route::group(
  [
    'middleware' => [
      'auth',
    ]
  ],
  function () {
    Route::get('/statuses/slug', [StatusesController::class, 'slug']);
  }
);

Route::group(
  [
    'middleware' => [
      'auth',
      'submenu.access',
      'permission',
    ]
  ],
  function () {
    Route::resource('/statuses', StatusesController::class);
  }
);
