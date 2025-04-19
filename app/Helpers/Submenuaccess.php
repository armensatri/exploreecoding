<?php

namespace App\Helpers;

use App\Models\Managemenu\Submenu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Submenuaccess
{
  public static function Submenu()
  {
    if (!Auth::check()) {
      return Redirect::route('login')->send();
    }

    $role_id = Auth::user()->role_id;
    $submenu = request()->segment(1);

    $querySubMenu = Submenu::where('name', $submenu)->first();

    if (!$querySubMenu) {
      return Redirect::route('blocked')->send();
    }

    $queryAccessSubMenu = DB::table('role_has_submenu')
      ->where('role_id', $role_id)
      ->where('submenu_id', $querySubMenu->id)
      ->exists();

    if (!$queryAccessSubMenu) {
      return Redirect::route('blocked')->send();
    }
  }
}
