<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\View\ViewController;

Route::group(
  [
    'middleware' => [
      'auth',
      'permission'
    ]
  ],
  function () {
    Route::get('/view/path', [ViewController::class, 'viewpath'])
      ->name('view.path');
  }
);
