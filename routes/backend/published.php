<?php

use App\Http\Controllers\Backend\Published\StatusesController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'middleware' => [
            'auth',
        ],
    ],
    function () {
        Route::get('/statuses/slug', [StatusesController::class, 'slug']);
    }
);

Route::group(
    [
        'middleware' => [
            'auth',
            'submenu.access',
            'permission',
        ],
    ],
    function () {
        Route::resource('/statuses', StatusesController::class);
    }
);
