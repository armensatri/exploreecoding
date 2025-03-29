<?php

namespace App\Http\Controllers\Backend\Account;

use Illuminate\Http\Request;
use App\Helpers\Submenuaccess;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ProfileController extends Controller
{
  public function __construct()
  {
    Submenuaccess::Submenu();
  }

  public function show()
  {
    $cacheKey = "profile_" . Auth::id();

    $user = Cache::remember($cacheKey, 300, function () {
      return Auth::user();
    });

    return view('backend.account.profile', [
      'title' => 'User profile ' . $user->username,
      'user' => $user
    ]);
  }
}
