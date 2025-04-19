<?php

namespace App\Helpers;

use App\Models\Managemenu\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginAccess
{
  public static function Menu()
  {
    if (!Auth::check()) {
      return Redirect::route('login')->send();
    }

    $role_id = Auth::user()->role_id;
    $menu = request()->segment(1);

    $queryMenu = Menu::where('name', $menu)->first();

    if (!$queryMenu) {
      return Redirect::route('blocked')->send();
    }

    $queryAccessMenu = DB::table('role_has_menu')
      ->where('role_id', $role_id)
      ->where('menu_id', $queryMenu->id)
      ->exists();

    if (!$queryAccessMenu) {
      return Redirect::route('blocked')->send();
    }
  }
}
