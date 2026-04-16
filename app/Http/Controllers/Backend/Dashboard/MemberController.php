<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Manageuser\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class MemberController extends Controller
{
  public function index()
  {
    $userId = Auth::id();

    $cache_key = 'member.user.'
      . User::cacheVersion() . '.'
      . $userId;

    $member_data = Cache::remember(
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

    $member = json_decode(json_encode($member_data));

    return view('backend.dashboard.member', [
      'title' => 'Dashboard',
      'member' => $member
    ]);
  }
}
