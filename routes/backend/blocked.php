<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Blocked\BlockedController;

Route::get('/blocked', [
  BlockedController::class,
  'blocked'
])->name('blocked');

Route::get('/blocked-permission', [
  BlockedController::class,
  'blockedpermission'
])->name('blocked.permission');
