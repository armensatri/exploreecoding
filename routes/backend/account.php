<?php

use App\Http\Controllers\Backend\Account\ChangePasswordController;
use App\Http\Controllers\Backend\Account\PersonalController;
use App\Http\Controllers\Backend\Account\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'middleware' => [
            'auth',
            'submenu.access',
            'permission',
        ],
    ],
    function () {
        Route::get('/profile', [ProfileController::class, 'index'])
            ->name('profile');

        Route::get('/personal', [PersonalController::class, 'index'])
            ->name('personal');

        Route::get('/changepassword', [
            ChangePasswordController::class,
            'index',
        ])->name('changepassword');
    }
);
