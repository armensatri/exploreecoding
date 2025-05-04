<?php

namespace App\Http\Middleware;

use App\Models\Managemenu\Submenu;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubmenuAccessMiddleware
{
  public function handle(Request $request, Closure $next)
  {
    if (!Auth::check()) {
      return redirect()->route('login');
    }

    $role_id = Auth::user()->role_id;
    $submenu = $request->segment(1);

    // Cek apakah submenu ada
    $querySubMenu = Submenu::where('name', $submenu)->first();

    if (!$querySubMenu) {
      return redirect()->route('blocked');
    }

    $queryAccessSubMenu = DB::table('role_has_submenu')
      ->where('role_id', $role_id)
      ->where('submenu_id', $querySubMenu->id)
      ->exists();

    if (!$queryAccessSubMenu) {
      return redirect()->route('blocked');
    }

    return $next($request);
  }
}
