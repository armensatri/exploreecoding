<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\{
  Auth,
  Cache
};

class SuperadminController extends Controller
{
  public function index()
  {
    $userId = Auth::id();

    $cache_key = 'superadmin.user.'
      . User::cacheVersion() . '.'
      . $userId;

    $superadmin_data = Cache::remember(
      $cache_key,
      now()->addMinutes(10),
      function () use ($userId) {
        return User::query()
          ->select([
            'id',
            'name',
            'role_id',
            'url'
          ])
          ->with('role:id,name,bg,text')
          ->findOrFail($userId)
          ->toArray();
      }
    );

    $superadmin = json_decode(json_encode($superadmin_data));

    return view('backend.dashboard.superadmin', [
      'title' => 'Dashboard',
      'superadmin' => $superadmin
    ]);
  }
}
