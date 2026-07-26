<?php

use App\Http\Controllers\Frontend\Tipscoding\CategoryController;
use App\Http\Controllers\Frontend\Tipscoding\TipscodingController;
use Illuminate\Support\Facades\Route;

Route::controller(TipscodingController::class)->group(
    function () {
        Route::get('/ec/tipscodings', 'index')
            ->name('ec-tipscodings.index');

        Route::get('/ec/tipscodings/category/{category:slug}', 'category')
            ->name('ec-tipscodings.category');

        Route::get(
            '/ec/tipscodings/category/{category:slug}/tips/{tipscoding:slug}',
            'show'
        )->name('ec-tipscodings.show');
    }
);

Route::controller(CategoryController::class)->group(
    function () {
        Route::get('/ec/tipscoding/categories', 'index')
            ->name('ec-categories.index');
    }
);
