<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
  public function handle(Request $request, Closure $next): Response
  {
    /** @var \App\Models\Manageuser\User $user */
    $user = Auth::user();

    if (!$user || !$user->role_id) {
      return Redirect::route('blocked.permission')->send();
    }

    // Ambil nama route saat ini (misal: 'dashboard' atau 'users.index')
    $routeName = $request->route()->getName();

    // OPTIMASI: Cek izin langsung dari memori RAM (0 ms / Tanpa Query Database)
    if (!$user->hasPermission($routeName)) {
      return Redirect::route('blocked.permission')->send();
    }

    return $next($request);
  }
}
