<?php

use App\Http\Controllers\Backend\Blocked\BlockedController;
use Illuminate\Support\Facades\Route;

Route::get('/blocked', [
    BlockedController::class,
    'blocked',
])->name('blocked');

Route::get('/blocked-permission', [
    BlockedController::class,
    'blockedpermission',
])->name('blocked.permission');
