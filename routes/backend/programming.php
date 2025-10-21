<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\Programming\{
  PathsController,
  RoadmapsController,
  PlaylistsController,
  PostsController,
};

Route::group(
  [
    'middleware' => [
      'auth',
      'submenu.access',
      'permission'
    ]
  ],
  function () {
    Route::resources([
      '/paths' => PathsController::class,
      '/roadmaps' => RoadmapsController::class,
      '/playlists' => PlaylistsController::class,
      '/posts' => PostsController::class
    ]);
  }
);
