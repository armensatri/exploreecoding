<?php

use App\Http\Controllers\Backend\Programming\PathsController;
use App\Http\Controllers\Backend\Programming\PlaylistsController;
use App\Http\Controllers\Backend\Programming\PostsController;
use App\Http\Controllers\Backend\Programming\RoadmapsController;
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
        Route::resources([
            '/paths' => PathsController::class,
            '/roadmaps' => RoadmapsController::class,
            '/playlists' => PlaylistsController::class,
            '/posts' => PostsController::class,
        ]);
    }
);
