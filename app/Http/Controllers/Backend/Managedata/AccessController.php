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
    $cacheKey = 'access.index.' . md5(
      json_encode(
        request()->all()
      )
    );

    $roles = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      function () {
        return Role::query()
          ->search(request(['search']))
          ->select([
            'id',
            'sr',
            'name',
            'bg',
            'text',
            'url',
          ])
          ->orderBy('sr', 'asc')
          ->paginate(10)
          ->withQueryString();
      }
    );

    return view('backend.managedata.access.index', [
      'title' => 'Access',
      'roles' => $roles
    ]);
  }
}
