<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class RouteServiceProvider extends ServiceProvider
{
  public const HOME = '/';

  public function register(): void
  {
    //
  }

  public function boot(): void
  {
    RateLimiter::for('login', function (Request $request) {
      $email = (string) $request->email;
      return Limit::perMinute(5)->by($email . $request->ip());
    });

    RateLimiter::for('register', function (Request $request) {
      return Limit::perMinute(5)->by($request->ip());
    });
  }
}
