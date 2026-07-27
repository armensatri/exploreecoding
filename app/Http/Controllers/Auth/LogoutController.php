<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Manageuser\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LogoutController extends Controller
{
  public function logout(Request $request)
  {
    User::where('id', Auth::id())->update([
      'status_on_of' => 0,
    ]);

    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return Redirect::route('home');
  }
}
