<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\{
  Auth,
  Cache
};

class OwnerController extends Controller
{
  public function index()
  {
    $userId = Auth::id();

    $cache_key = 'owner.user.'
      . User::cacheVersion() . '.'
      . $userId;

    $owner_data = Cache::remember(
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

    $owner = json_decode(json_encode($owner_data));

    return view('backend.dashboard.owner', [
      'title' => 'Dashboard',
      'owner' => $owner
    ]);
  }
}
