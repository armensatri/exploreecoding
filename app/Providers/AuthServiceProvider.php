<?php

namespace App\Providers;

use App\View\Components\Auth\Message;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
  public function register(): void
  {
    //
  }

  public function boot(): void
  {
    Blade::component('message', Message::class);
  }
}
