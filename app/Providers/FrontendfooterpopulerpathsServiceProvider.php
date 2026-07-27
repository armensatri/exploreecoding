<?php

namespace App\Providers;

use App\Models\Programming\Path;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class FrontendfooterpopulerpathsServiceProvider extends ServiceProvider
{
  public function register(): void
  {
    //
  }

  public function boot(): void
  {
    View::composer('frontend.template.footer', function ($view) {

      $populerpaths = Path::query()
        ->select([
          'id',
          'name',
        ])
        ->withCount('pathviews')
        ->orderByDesc('pathviews_count')
        ->limit(3)
        ->get();

      $view->with(compact('populerpaths'));
    });
  }
}
