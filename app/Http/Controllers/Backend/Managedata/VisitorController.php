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
    $filters = request(['search', 'role']);

    $cacheKey = 'visitor.index.ids.'
      . User::cacheVersion() . '.'
      . md5(json_encode($filters));

    $ids = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      fn() => User::query()
        ->search($filters)
        ->where('status', 1)
        ->orderBy('id', 'asc')
        ->pluck('id')
        ->toArray()
    );

    $users = User::query()
      ->whereIn('id', $ids)
      ->select([
        'id',
        'name',
        'role_id',
        'status_on_of',
        'last_seen',
        'status',
        'url'
      ])->with(['role:id,name,bg,text'])
      ->orderBy('id', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.managedata.visitor.index', [
      'title' => 'Visitor',
      'users' => $users
    ]);
  }

  public function banned()
  {
    $filters = request(['search', 'role']);

    $cacheKey = 'visitor.banned.ids.'
      . User::cacheVersion() . '.'
      . md5(json_encode($filters));

    $ids = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      fn() => User::query()
        ->search($filters)
        ->where('status', 0)
        ->orderBy('id', 'asc')
        ->pluck('id')
        ->toArray()
    );

    $users = User::query()
      ->whereIn('id', $ids)
      ->select([
        'id',
        'name',
        'role_id',
        'status',
        'url'
      ])->with(['role:id,name,bg,text'])
      ->orderBy('id', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.managedata.visitor.banned', [
      'title' => 'Visitor banned',
      'users' => $users
    ]);
  }
}
