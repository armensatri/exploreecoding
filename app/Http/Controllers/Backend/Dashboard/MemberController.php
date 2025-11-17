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
    $cacheKey = "dashboard_member_{$userId}";

    $member = Cache::remember(
      $cacheKey,
      now()->addMinutes(5),
      function () use ($userId) {
        return User::find($userId);
      }
    );

    return view('backend.dashboard.member', [
      'title' => 'Dashboard',
      'member' => $member
    ]);
  }
}
