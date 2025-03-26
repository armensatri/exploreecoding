<?php

namespace App\Http\Controllers\Backend\Manageaccess;

use Illuminate\Http\Request;
use App\Helpers\Submenuaccess;
use App\Models\Manageuser\Role;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
  public function __construct()
  {
    Submenuaccess::Submenu();
  }

  public function index()
  {
    $roles = Role::select(['id', 'sr', 'bg', 'text', 'name'])
      ->with(['menus'])
      ->orderBy('sr', 'asc')
      ->get();

    return view('backend.manageaccess.menu', [
      'title' => 'Show acces menu',
      'roles' => $roles
    ]);
  }
}
