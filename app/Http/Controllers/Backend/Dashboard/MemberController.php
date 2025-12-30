<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\{
  Auth,
  Cache,
};

class MemberController extends Controller
{
  public function index()
  {
    $userId = Auth::id();

    $cacheKey = 'member.user.'
      . User::cacheVersion() . '.'
      . $userId;

    $member = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      fn() => User::query()
        ->select([
          'id',
          'name',
          'role_id',
          'url'
        ])->with('role:id,name,bg,text')
        ->findOrFail($userId)
    );

    return view('backend.dashboard.member', [
      'title' => 'Dashboard',
      'member' => $member
    ]);
  }
}
