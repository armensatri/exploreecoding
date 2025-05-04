<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
  ->withRouting(
    // web: __DIR__ . '/../routes/web.php',
    commands: __DIR__ . '/../routes/console.php',
    health: '/up',
    web: [
      __DIR__ . '/../routes/web.php',
      __DIR__ . '/../routes/auth/auth.php',
      __DIR__ . '/../routes/backend/be-account.php',
      __DIR__ . '/../routes/backend/be-blocked.php',
      __DIR__ . '/../routes/backend/be-comment.php',
      __DIR__ . '/../routes/backend/be-dashboard.php',
      __DIR__ . '/../routes/backend/be-manageaccess.php',
      __DIR__ . '/../routes/backend/be-managedata.php',
      __DIR__ . '/../routes/backend/be-managemenu.php',
      __DIR__ . '/../routes/backend/be-manageuser.php',
      __DIR__ . '/../routes/backend/be-programming.php',
      __DIR__ . '/../routes/backend/be-published.php',
      __DIR__ . '/../routes/backend/be-random.php',
      __DIR__ . '/../routes/frontend/fe-home.php',
    ],
  )

  ->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
      'permission' => \App\Http\Middleware\PermissionMiddleware::class,
      'submenu_access' => \App\http\Middleware\SubmenuAccessMiddleware::class,
    ]);
  })

  ->withExceptions(function (Exceptions $exceptions) {
    //
  })->create();
