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
  PathObserver,
  PlaylistObserver,
  PostObserver,
  RoadmapObserver,
  StatusObserver
};

use App\Models\Managemenu\{
  Menu,
  Submenu,
};

use App\Models\Manageuser\{
  User,
  Role,
  Permission,
};
use App\Models\Programming\Path;
use App\Models\Programming\Playlist;
use App\Models\Programming\Post;
use App\Models\Programming\Roadmap;
use App\Models\Published\Status;

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

    User::observe(DataSummaryObserver::class);
    Role::observe(DataSummaryObserver::class);
    Permission::observe(DataSummaryObserver::class);

    Menu::observe(DataSummaryObserver::class);
    Submenu::observe(DataSummaryObserver::class);

    Status::observe(DataSummaryObserver::class);

    Path::observe(DataSummaryObserver::class);
    Roadmap::observe(DataSummaryObserver::class);
    Playlist::observe(DataSummaryObserver::class);
    Post::observe(DataSummaryObserver::class);
  }
}
