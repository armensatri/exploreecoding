<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Redirects
{
  public static function Dashboard()
  {
    $user = Auth::user();

    if (!$user) {
      return Redirect::route('login')->send();
    }

    $routes = [
      'owner' => 'owner',
      'superadmin' => 'superadmin',
      'member' => 'member',
    ];

    return $routes[$user->role->name] ?? route('home');
  }
}
