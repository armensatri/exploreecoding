<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Access
{
  public static function toDashboard()
  {
    if (!Auth::check()) {
      return Redirect::route('login')->send();
    }

    $roleId = Auth::user()->role_id;
    $menuName = request()->segment(1);

    $hasAccess = DB::table('menus')
      ->join('role_has_menu', 'menus.id', '=', 'role_has_menu.menu_id')
      ->where('menus.name', $menuName)
      ->where('role_has_menu.role_id', $roleId)
      ->exists();

    if (!$hasAccess) {
      return Redirect::route('blocked')->send();
    }
  }
}
