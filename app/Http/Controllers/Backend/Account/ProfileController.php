<?php

namespace App\Http\Controllers\Backend\Account;

use Illuminate\Http\Request;
use App\Helpers\Submenuaccess;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
  public function __construct()
  {
    Submenuaccess::Submenu();
  }

  public function show()
  {
    $user = Auth::user();

    return view('backend.account.profile', [
      'title' => 'User profile ' . $user->username,
      'user' => $user
    ]);
  }
}
