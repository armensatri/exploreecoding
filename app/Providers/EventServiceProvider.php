<?php

namespace App\Providers;

use App\Observers\MenuObserver;
use App\Models\Managemenu\Menu;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    Menu::observe(MenuObserver::class);
  }
}
