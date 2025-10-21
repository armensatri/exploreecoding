<?php

use App\Http\Middleware\UserStatus;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
  ->withRouting(
    web: __DIR__ . '/../routes/web.php',
    commands: __DIR__ . '/../routes/console.php',
    health: '/up',
  )

  ->withMiddleware(function (Middleware $middleware): void {
    $middleware->alias([
      'submenu.access' => \App\Http\Middleware\SubmenuAccessMiddleware::class,
      'permission' =>
      \App\Http\Middleware\PermissionMiddleware::class,
    ]);

    // SECURITY HEADER
    // $middleware->append(
    //   \App\Http\Middleware\SecurityHeadersMiddleware::class
    // );

    // STATUS USER
    $middleware->web(append: [
      UserStatus::class,
    ]);
  })

  ->withExceptions(function (Exceptions $exceptions): void {
    //
  })->create();
