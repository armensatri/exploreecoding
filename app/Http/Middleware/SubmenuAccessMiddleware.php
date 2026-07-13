<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class SubmenuAccessMiddleware
{
  public function handle(Request $request, Closure $next): Response
  {
    if (!Auth::check()) {
      return Redirect::route('login')->send();
    }

    /** @var \App\Models\Manageuser\User $user */
    $user = Auth::user();

    $submenu_name = $request->segment(1);

    // Sekarang method hasSubmenu() akan dikenali dengan aman dan tanpa query ulang
    if (!$user->hasSubmenu($submenu_name)) {
      return Redirect::route('blocked')->send();
    }

    return $next($request);
  }
}
