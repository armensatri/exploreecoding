<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\View\Components\Frontend\Header\RouteToDashboard;

use App\View\Components\Frontend\MenuWeb\{
  ExploreCoding,
  MenuUtama,
  ExploreLainnya,
  MenuWebHeader,
};

class FrontendServiceProvider extends ServiceProvider
{
  public function register(): void
  {
    //
  }

  public function boot(): void
  {
    // HEADER
    Blade::component('route-to-dashboard', RouteToDashboard::class);

    // MENU WEB
    Blade::component('explore-coding', ExploreCoding::class);
    Blade::component('menu-web-header', MenuWebHeader::class);
    Blade::component('menu-utama', MenuUtama::class);
    Blade::component('explore-lainnya', ExploreLainnya::class);
  }
}
