<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
  public function logout(Request $request)
  {
    User::where(
      'id',
      Auth::user()->id
    )->update(['status' => 0]);

    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();


    return redirect()->route('home');
  }
}
