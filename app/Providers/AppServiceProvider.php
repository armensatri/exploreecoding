<?php

namespace App\Providers;

use App\Models\Managemenu\Menu;
use App\Models\Managemenu\Submenu;
use App\Models\Manageuser\Permission;
use App\Models\Manageuser\Role;
use App\Models\Manageuser\User;
use App\Models\Programming\Path;
use App\Models\Programming\Playlist;
use App\Models\Programming\Post;
use App\Models\Programming\Roadmap;
use App\Models\Published\Status;
use App\Models\Tipscoding\Category;
use App\Models\Tipscoding\Tipscoding;
use App\Observers\CategoryObserver;
use App\Observers\MenuObserver;
use App\Observers\PathObserver;
use App\Observers\PermissionObserver;
use App\Observers\PlaylistObserver;
use App\Observers\PostObserver;
use App\Observers\RoadmapObserver;
use App\Observers\RoleObserver;
use App\Observers\StatusObserver;
use App\Observers\SubmenuObserver;
use App\Observers\TipscodingObserver;
use App\Observers\UserObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

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
