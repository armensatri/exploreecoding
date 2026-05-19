<?php

namespace App\Http\Controllers\Backend\Managedata;

use App\Http\Controllers\Controller;
use App\Models\Manageuser\User;

class VisitorController extends Controller
{
  public function index()
  {
    $users = User::query()
      ->search(request(['search', 'username']))
      ->select([
        'id',
        'username',
        'role_id',
        'status_on_of',
        'last_seen',
        'status',
        'url'
      ])->with('role:id,name,bg,text')
      ->orderBy('id', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.managedata.visitor.index', [
      'title' => 'Visitor',
      'users' => $users
    ]);
  }

  // banned lagi ya
}
