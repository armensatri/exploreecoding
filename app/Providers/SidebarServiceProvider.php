<?php

namespace App\Providers;

use App\Models\Managemenu\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Collection;

class SidebarServiceProvider extends ServiceProvider
{
  protected static ?Collection $cachedMenus = null;

  public function register(): void
  {
    //
  }

  public function boot(): void
  {
    view()->composer('backend.template.sidebar', function ($view) {
      $user = Auth::user();

      if (!$user) {
        return $view->with('menus', collect());
      }

      if (static::$cachedMenus === null) {
        static::$cachedMenus = Menu::select('id', 'name', 'sm')
          ->with([
            'submenus' => fn($query) => $query->select(
              'id',
              'menu_id',
              'name',
              'ssm',
              'active',
              'routename'
            )->orderBy('ssm', 'asc')
          ])
          // OPTIMASI: Langsung cek ke kolom di tabel pivot tanpa join ke tabel roles utama
          ->whereRelation('roles', 'role_has_menu.role_id', $user->role_id)
          ->orderBy('sm', 'asc')
          ->get();
      }

      $view->with('menus', static::$cachedMenus);
    });
  }
}
