<?php

use App\Http\Controllers\Backend\View\ViewController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'middleware' => [
            'auth',
            'permission',
        ],
    ],
    function () {
        Route::get('/view/path', [ViewController::class, 'viewpath'])
            ->name('view.path');
    }
);
