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
  PermissionObserver,
  DataSummaryObserver,
  ExploreObserver
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


    // Register User, Role, Permission, Menu, Submenu observers for cache clearing
    User::observe(UserObserver::class);
    Role::observe(RoleObserver::class);
    Permission::observe(PermissionObserver::class);

    Menu::observe(MenuObserver::class);
    Submenu::observe(SubmenuObserver::class);
    Explore::observe(ExploreObserver::class);
    Navigation::observe(\App\Observers\NavigationObserver::class);

    \App\Models\Programming\Path::observe(\App\Observers\PathObserver::class);
    \App\Models\Programming\Roadmap::observe(\App\Observers\RoadmapObserver::class);
    \App\Models\Programming\Playlist::observe(\App\Observers\PlaylistObserver::class);
    \App\Models\Programming\Post::observe(\App\Observers\PostObserver::class);
    \App\Models\Published\Status::observe(\App\Observers\StatusObserver::class);

    // Register DataSummaryObserver for dashboard summary cache clearing
    \App\Models\Manageuser\User::observe(DataSummaryObserver::class);
    \App\Models\Manageuser\Role::observe(DataSummaryObserver::class);
    \App\Models\Manageuser\Permission::observe(DataSummaryObserver::class);
    \App\Models\Managemenu\Menu::observe(DataSummaryObserver::class);
    \App\Models\Managemenu\Submenu::observe(DataSummaryObserver::class);
    \App\Models\Managemenu\Explore::observe(DataSummaryObserver::class);
    \App\Models\Managemenu\Navigation::observe(DataSummaryObserver::class);
    \App\Models\Published\Status::observe(DataSummaryObserver::class);
    \App\Models\Programming\Path::observe(DataSummaryObserver::class);
    \App\Models\Programming\Roadmap::observe(DataSummaryObserver::class);
    \App\Models\Programming\Playlist::observe(DataSummaryObserver::class);
    \App\Models\Programming\Post::observe(DataSummaryObserver::class);

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
