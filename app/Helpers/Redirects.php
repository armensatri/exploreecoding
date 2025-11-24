<?php

namespace App\Helpers;

use App\Models\Manageuser\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Redirects
{
  public static function Dashboard()
  {
    $user = User::find(Auth::id());

    if (!$user) {
      return Redirect::route('login')->send();
    }

    $routes = [
      'owner' => 'owner',
      'superadmin' => 'superadmin',
      'creator' => 'creator',
      'member' => 'member',
    ];

    return $routes[$user->role->name] ?? route('home');
  }
}
