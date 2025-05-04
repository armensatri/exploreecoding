<?php

use Illuminate\Support\Facades\Route;

Route::group(
  [
    'middleware' => [
      'auth',
      'submenu_access'
    ]
  ],
  function () {
    //
  }
);
