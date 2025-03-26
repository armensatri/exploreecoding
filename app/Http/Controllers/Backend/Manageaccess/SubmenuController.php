<?php

namespace App\Http\Controllers\Backend\Manageaccess;

use Illuminate\Http\Request;
use App\Helpers\Submenuaccess;
use App\Models\Manageuser\Role;
use App\Http\Controllers\Controller;

class SubmenuController extends Controller
{
  public function __construct()
  {
    Submenuaccess::Submenu();
  }

  public function index()
  {
    $roles = Role::select(['id', 'sr', 'bg', 'text', 'name'])
      ->with(['submenus'])
      ->orderBy('sr', 'asc')
      ->get();

    return view('backend.manageaccess.submenu', [
      'title' => 'Show acces submenu',
      'roles' => $roles
    ]);
  }
}
