<?php

namespace App\Http\Controllers\Backend\Managedata;

use Illuminate\Http\Request;
use App\Models\Manageuser\User;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;

class VisitorController extends Controller
{
  public function index()
  {
    $cacheKey = 'visitor.index.' . md5(
      json_encode(
        request(['search', 'role'])
      )
    );

    $users = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      function () {
        return User::query()
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
          ->paginate(10)
          ->withQueryString();
      }
    );

    return view('backend.managedata.visitor.index', [
      'title' => 'Visitor',
      'users' => $users
    ]);
  }

  public function banned()
  {
    $cacheKey = 'visitor.banned.' . md5(
      json_encode(
        request(['search', 'role'])
      )
    );

    $users = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      function () {
        return User::query()
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
          ->paginate(10)
          ->withQueryString();
      }
    );

    return view('backend.managedata.visitor.banned', [
      'title' => 'Visitor banned',
      'users' => $users
    ]);
  }
}
