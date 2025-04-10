<?php

namespace App\Http\Controllers\Backend\Managedata;

use Illuminate\Http\Request;
use App\Helpers\Submenuaccess;
use App\Http\Controllers\Controller;
use App\Models\Manageuser\User;

class VisitorController extends Controller
{
  public function __construct()
  {
    Submenuaccess::Submenu();
  }

  public function index()
  {
    $users = User::search(request(['search', 'role']))
      ->select(['id', 'image', 'name', 'role_id', 'username', 'last_seen'])
      ->with(['role'])
      ->orderby('role_id', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.managedata.visitor.index', [
      'title' => 'Semua data visitor',
      'users' => $users
    ]);
  }
}
