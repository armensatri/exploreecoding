<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
  public function handle(Request $request, Closure $next): Response
  {
    $user = Auth::user();

    if (!$user || !$user->role_id) {
      return Redirect::route('blocked.permission')->send();
    }

    $routeName = $request->route()->getName();

    $hasPermission = DB::table('permissions')
      ->join(
        'role_has_permission',
        'permissions.id',
        '=',
        'role_has_permission.permission_id'
      )
      ->where('role_has_permission.role_id', $user->role_id)
      ->where('permissions.name', $routeName)
      ->exists();

    if (!$hasPermission) {
      return Redirect::route('blocked.permission')->send();
    }

    return $next($request);
  }
}
