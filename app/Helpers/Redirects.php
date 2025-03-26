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
      return Redirect::route('home')->send();
    }

    $routes = [
      'owner' => 'owner',
      'superadmin' => 'superadmin',
      'admin' => 'admin',
      'member' => 'member'
    ];

    return $routes[$user->role->name] ?? route('home');
  }
}
