<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LogoutController extends Controller
{
  public function logout(Request $request)
  {
    User::where('id', Auth::id())->update([
      'status_on_of' => 0,
      'last_seen' => null
    ]);

    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return Redirect::route('home');
  }
}
