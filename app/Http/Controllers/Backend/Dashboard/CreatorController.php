<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\{
  Auth,
  Cache
};

class CreatorController extends Controller
{
  public function index()
  {
    $userId = Auth::id();

    $cache_key = 'creator.user.'
      . User::cacheVersion() . '.'
      . $userId;

    $creator_data = Cache::remember(
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

    $creator = json_decode(json_encode($creator_data));

    return view('backend.dashboard.creator', [
      'title' => 'Dashboard',
      'creator' => $creator
    ]);
  }
}
