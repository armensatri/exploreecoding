<?php

namespace App\Providers;

use App\Models\Published\Status;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;

use App\Observers\{
  UserObserver,
  RoleObserver,
  PermissionObserver,

  MenuObserver,
  SubmenuObserver,

  StatusObserver,

  PathObserver,
  RoadmapObserver,
  PlaylistObserver,
  PostObserver,

  TipscodingObserver,
  CategoryObserver,
};

use App\Models\Manageuser\{
  User,
  Role,
  Permission,
};

use App\Models\Managemenu\{
  Menu,
  Submenu,
};

use App\Models\Programming\{
  Path,
  Roadmap,
  Playlist,
  Post,
};

use App\Models\Tipscoding\{
  Category,
  Tipscoding,
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

    User::observe(UserObserver::class);
    Role::observe(RoleObserver::class);
    Permission::observe(PermissionObserver::class);

    Menu::observe(MenuObserver::class);
    Submenu::observe(SubmenuObserver::class);

    Status::observe(StatusObserver::class);

    Path::observe(PathObserver::class);
    Roadmap::observe(RoadmapObserver::class);
    Playlist::observe(PlaylistObserver::class);
    Post::observe(PostObserver::class);

    Tipscoding::observe(TipscodingObserver::class);
    Category::observe(CategoryObserver::class);
  }
}
