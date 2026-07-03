<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\View\ViewController;

Route::group(
  [
    'middleware' => [
      'auth',
      'submenu.access',
      'permission'
    ]
  ],
  function () {
    Route::get('/view', [ViewController::class, 'index'])
      ->name('view.index');
  }
);
