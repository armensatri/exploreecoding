<?php

use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'middleware' => [
            'auth',
        ],
    ],
    function () {
        Route::post('/auth/logout', [LogoutController::class, 'logout'])
            ->name('logout');
    }
);
