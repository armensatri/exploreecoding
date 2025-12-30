<?php

namespace App\Http\Controllers\Backend\Managedata;

use Illuminate\Http\Request;
use App\Models\Manageuser\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class AccessController extends Controller
{
  public function index()
  {
    $filters = request(['search']);

    $cacheKey = 'access.index.ids.'
      . Role::cacheVersion() . '.'
      . md5(json_encode($filters));

    $ids = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      fn() => Role::query()
        ->search($filters)
        ->orderBy('sr', 'asc')
        ->pluck('id')
        ->toArray()
    );

    $roles = Role::query()
      ->whereIn('id', $ids)
      ->select([
        'id',
        'sr',
        'name',
        'bg',
        'text',
        'url'
      ])
      ->orderBy('sr', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.managedata.access.index', [
      'title' => 'Access',
      'roles' => $roles
    ]);
  }
}
