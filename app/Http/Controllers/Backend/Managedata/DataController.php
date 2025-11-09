<?php

namespace App\Http\Controllers\Backend\Managedata;

use Illuminate\Http\Request;
use App\Models\Published\Status;
use App\Http\Controllers\Controller;

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
    return view('backend.managedata.data.index', [
      'title' => 'Data',
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
    ]);
  }
}
