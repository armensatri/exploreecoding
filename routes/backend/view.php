<?php

use App\Http\Controllers\Backend\View\ViewController;
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
        Route::get('/view', [ViewController::class, 'index'])
            ->name('view.index');
    }
);
