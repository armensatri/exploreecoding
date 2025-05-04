<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Blocked\BlockedController;

Route::get('/access-blocked', [BlockedController::class, 'blocked'])
  ->name('blocked');
