<?php

namespace App\Providers;

use App\View\Components\Frontend\Footer\FooterMenu;
use App\View\Components\Frontend\Footer\FooterSodmed;
use App\View\Components\Frontend\Footer\FooterSubmenu;
use App\View\Components\Frontend\Header\MenuAuth;
use App\View\Components\Frontend\Header\MobileDefault;
use App\View\Components\Frontend\Header\MobileExploreLainnya;
use App\View\Components\Frontend\Header\MobileMenuUtama;
use App\View\Components\Frontend\Header\WebDefault;
use App\View\Components\Frontend\Header\WebExploreLainnya;
use App\View\Components\Frontend\Header\WebMenuUtama;
use App\View\Components\Frontend\Home\Question;
use App\View\Components\Frontend\Paginate\Paginate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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

        // PAGINATE
        Blade::component('paginate', Paginate::class);
    }
}
