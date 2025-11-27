<?php

namespace App\Http\Controllers\Backend\Managedata;

use Illuminate\Http\Request;
use App\Models\Published\Status;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

use App\Models\Manageuser\{
  User,
  Role,
  Permission,
};

use App\Models\Managemenu\{
  Menu,
  Submenu,
  Explore,
  Navigation,
};

use App\Models\Programming\{
  Path,
  Post,
  Roadmap,
  Playlist,
};

class DataController extends Controller
{
  public function index()
  {
    $cacheKey = 'data.index.summary';

    $data = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      function () {
        return [
          'users' => User::count(),
          'roles' => Role::count(),
          'permissions' => Permission::count(),
          'menus' => Menu::count(),
          'submenus' => Submenu::count(),
          'explores' => Explore::count(),
          'navigations' => Navigation::count(),
          'statuses' => Status::count(),
          'paths' => Path::count(),
          'roadmaps' => Roadmap::count(),
          'playlists' => Playlist::count(),
          'posts' => Post::count(),
        ];
      }
    );
    return view(
      'backend.managedata.data.index',
      array_merge(['title' => 'Data'], $data)
    );
  }
}
