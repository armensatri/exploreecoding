<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\View\Components\Frontend\Home\Question;

use App\View\Components\Frontend\Header\{
  MenuAuth,
  WebDefault,
  WebMenuUtama,
  WebExploreLainnya,
  MobileDefault,
  MobileMenuUtama,
  MobileExploreLainnya,
};

use App\View\Components\Frontend\Footer\{
  FooterMenu,
  FooterSodmed,
  FooterSubmenu,
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
    Blade::component('web-default', WebDefault::class);
    Blade::component('web-menu-utama', WebMenuUtama::class);
    Blade::component('web-explore-lainnya', WebExploreLainnya::class);
    Blade::component('mobile-default', MobileDefault::class);
    Blade::component('mobile-menu-utama', MobileMenuUtama::class);
    Blade::component(
      'mobile-explore-lainnya',
      MobileExploreLainnya::class
    );
    Blade::component('menu-auth', MenuAuth::class);

    // HOME
    Blade::component('question', Question::class);

    // FOOTER
    Blade::component('footer-menu', FooterMenu::class);
    Blade::component('footer-submenu', FooterSubmenu::class);
    Blade::component('footer-sosmed', FooterSodmed::class);
  }
}
