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
};

use App\Models\Programming\{
  Path,
  Roadmap,
  Playlist,
  Post,
};

use App\Models\Tipscoding\{
  Tipscoding,
  Category,
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
      'statuses' => Status::count(),
      'paths' => Path::count(),
      'roadmaps' => Roadmap::count(),
      'playlists' => Playlist::count(),
      'posts' => Post::count(),
      'tipscodings' => Tipscoding::count(),
      'categories' => Category::count()
    ]);
  }
}
