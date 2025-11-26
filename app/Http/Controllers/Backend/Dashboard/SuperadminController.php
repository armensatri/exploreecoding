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

    $cacheKey = 'superadmin.user.' . $userId;

    $superadmin = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      fn() => User::find($userId)
    );

    return view('backend.dashboard.superadmin', [
      'title' => 'Dashboard',
      'superadmin' => $superadmin
    ]);
  }
}
