<?php

use Illuminate\Support\Facades\Route;

Route::group(
  [
    'middleware' => [
      'auth',
      'submenu.access',
      'permission'
    ]
  ],
  function () {
    Route::resources([
      //
    ]);
  }
);
