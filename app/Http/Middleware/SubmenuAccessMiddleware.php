<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class SubmenuAccessMiddleware
{
  public function handle(Request $request, Closure $next): Response
  {
    if (!Auth::check()) {
      return Redirect::route('login');
    }

    $role_id = Auth::user()->role_id;
    $submenu_name = $request->segment(1);

    $hasSubmenu = DB::table('role_has_submenu')
      ->join(
        'submenus',
        'role_has_submenu.submenu_id',
        '=',
        'submenus.id'
      )
      ->where('role_has_submenu.role_id', $role_id)
      ->where('submenus.name', $submenu_name)
      ->exists();

    if (!$hasSubmenu) {
      return Redirect::route('blocked');
    }

    return $next($request);
  }
}
