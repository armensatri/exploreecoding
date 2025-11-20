<?php

namespace App\Providers;

use App\Observers\UserObserver;
use App\Models\Manageuser\User;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

use App\Models\Managemenu\{
  Explore,
  Navigation
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

    View::composer([
      'frontend.template.header.web',
      'frontend.template.header.mobile',
    ], function ($view) {
      $view->with([
        'explores' => Explore::all(),
        'navigations' => Navigation::all(),
      ]);
    });

    User::observe(UserObserver::class);
  }
}
