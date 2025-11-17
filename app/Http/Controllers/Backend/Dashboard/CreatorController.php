<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\{
  Auth,
  Cache,
};

class CreatorController extends Controller
{
  public function index()
  {
    $userId = Auth::id();
    $cacheKey = "dashboard_creator_{$userId}";

    $creator = Cache::remember(
      $cacheKey,
      now()->addMinutes(5),
      function () use ($userId) {
        return User::find($userId);
      }
    );

    return view('backend.dashboard.creator', [
      'title' => 'Dashboard',
      'creator' => $creator
    ]);
  }
}
