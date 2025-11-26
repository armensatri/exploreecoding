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

    $cacheKey = 'creator.user.' . $userId;

    $creator = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      fn() => User::find($userId)
    );

    return view('backend.dashboard.creator', [
      'title' => 'Dashboard',
      'creator' => $creator
    ]);
  }
}
