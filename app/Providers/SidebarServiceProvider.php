<?php

namespace App\Providers;

use App\Models\Managemenu\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class SidebarServiceProvider extends ServiceProvider
{
  public function register(): void
  {
    //
  }

  public function boot(): void
  {
    view()->composer(
      'backend.template.sidebar',

      function ($view) {
        $user = Auth::user();

        if (!$user) {
          return $view->with('menus', collect());
        }

        $menus = Menu::with([
          'submenus' => fn($query) => $query->select(
            'id',
            'menu_id',
            'name',
            'ssm',
            'active',
            'routename'
          )->orderBy('ssm', 'asc')
        ])->select(
          'id',
          'name',
          'sm'
        )->whereHas('roles', fn($query) => $query->where(
          'role_id',
          $user->role_id
        ))->orderBy('sm', 'asc')->get();

        $view->with('menus', $menus);
      }
    );
  }
}
