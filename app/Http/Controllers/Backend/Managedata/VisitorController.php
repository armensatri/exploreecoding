<?php

namespace App\Http\Controllers\Backend\Managedata;

use Illuminate\Http\Request;
use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;

class VisitorController extends Controller
{
  public function index()
  {
    $users = User::query()
      ->search(request(['search', 'role']))
      ->select([
        'id',
        'name',
        'role_id',
        'status_on_of',
        'last_seen',
        'status',
        'url'
      ])
      ->with(['role:id,name,bg,text'])
      ->orderby('id', 'asc')
      ->where('status', 1)
      ->paginate(15)
      ->withQueryString();

    return view('backend.managedata.visitor.index', [
      'title' => 'Visitor',
      'users' => $users
    ]);
  }

  public function banned()
  {
    $users = User::query()
      ->search(request(['search', 'role']))
      ->select([
        'id',
        'name',
        'role_id',
        'status',
      ])
      ->with(['role:id,name,bg,text'])
      ->orderby('id', 'asc')
      ->where('status', 0)
      ->paginate(15)
      ->withQueryString();

    return view('backend.managedata.visitor.banned', [
      'title' => 'Visitor banned',
      'users' => $users
    ]);
  }
}
