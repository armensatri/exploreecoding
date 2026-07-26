<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'middleware' => [
            'guest',
        ],
    ],
    function () {
        Route::controller(RegisterController::class)->group(
            function () {
                Route::get('/auth/register', 'index')
                    ->name('register');
                Route::post('/auth/register', 'store')
                    ->name('register.store');
            }
        );
    }
);
