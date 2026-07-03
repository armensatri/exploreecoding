<?php

namespace App\Helpers;

use Illuminate\Support\Facades\{
  Auth,
  Redirect
};

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
      'creator' => 'creator',
      'member' => 'member'
    ];

    $roleName = $user->role->name ?? '';

    return $routes[$roleName] ?? route('home');
  }
}
