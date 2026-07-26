<?php

namespace App\Http\Controllers\Backend\Managedata;

use App\Http\Controllers\Controller;
use App\Models\Managemenu\Menu;
use App\Models\Managemenu\Submenu;
use App\Models\Manageuser\Permission;
use App\Models\Manageuser\Role;
use App\Models\Manageuser\User;
use App\Models\Programming\Path;
use App\Models\Programming\Playlist;
use App\Models\Programming\Post;
use App\Models\Programming\Roadmap;
use App\Models\Published\Status;
use App\Models\Tipscoding\Category;
use App\Models\Tipscoding\Tipscoding;

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
            'categories' => Category::count(),
        ]);
    }
}
