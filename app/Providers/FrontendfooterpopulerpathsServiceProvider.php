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

      $getstarted = Path::query()
        ->select([
          'id',
          'sp',
          'name',
        ])
        ->where('sp', 1)
        ->first();

      $populerpaths = Path::query()
        ->select([
          'id',
          'sp',
          'name',
        ])
        ->withCount('pathviews')
        ->where('sp', '!=', 1)
        ->orderByDesc('pathviews_count')
        ->limit(2)
        ->get();

      $populerpaths = collect([$getstarted])
        ->merge($populerpaths)
        ->values();

      $view->with(compact('populerpaths'));
    });
  }
}
