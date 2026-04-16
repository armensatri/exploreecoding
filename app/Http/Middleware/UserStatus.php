<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Manageuser\User;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\{
  Auth,
};
use RealRashid\SweetAlert\Facades\Alert;

class UserStatus
{
  public function handle(Request $request, Closure $next): Response
  {
    $user = Auth::user();

    if ($user && $user->status === 0) {
      User::where('id', Auth::id())->update([
        'status_on_of' => 0,
        'last_seen' => null
      ]);

      Auth::logout();

      $request->session()->invalidate();
      $request->session()->regenerateToken();

      Alert::warning(
        'Oops..',
        'Akun anda! di banned.'
      );

      return redirect()->route('login');
    }

    return $next($request);
  }
}
