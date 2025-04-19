<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\View\Components\Random\Auth\Error\Messages;

class RandomServiceProvider extends ServiceProvider
{
  public function register(): void
  {
    //
  }

  public function boot(): void
  {
    // * AUTH

    // MESSAGE
    Blade::component('messages', Messages::class);

    // * BACKEND

    // * FRONTEND
  }
}
