<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

use App\Observers\{
  MenuObserver,
  SubmenuObserver,
  UserObserver,
  RoleObserver,
  PermissionObserver
};

use App\Models\Managemenu\{
  Explore,
  Menu,
  Navigation,
  Submenu,
};

use App\Models\Manageuser\{
  User,
  Role,
  Permission,
};


class AppServiceProvider extends ServiceProvider
{
  public function register(): void
  {
    //
  }

  public function boot(): void
  {
    Model::preventLazyLoading(! app()->isProduction());

    // Register User, Role, Permission, Menu, and Submenu observers for cache clearing
    User::observe(UserObserver::class);
    Role::observe(RoleObserver::class);
    Permission::observe(PermissionObserver::class);
    Menu::observe(MenuObserver::class);
    Submenu::observe(SubmenuObserver::class);

    View::composer([
      'frontend.template.header.web',
      'frontend.template.header.mobile',
    ], function ($view) {
      $view->with([
        'explores' => Explore::all(),
        'navigations' => Navigation::all(),
      ]);
    });
  }
}
