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

    $cacheKey = 'member.user.' . $userId;

    $member = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      fn() => User::find($userId)
    );

    return view('backend.dashboard.member', [
      'title' => 'Dashboard',
      'member' => $member
    ]);
  }
}
