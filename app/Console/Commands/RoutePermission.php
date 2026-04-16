<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use App\Models\Manageuser\Permission;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Attributes\Description;

#[Signature('permission:cpr')]
#[Description('Create permission routes')]

class RoutePermission extends Command
{
  public function __construct()
  {
    parent::__construct();
  }

  public function handle()
  {
    $routes = collect(Route::getRoutes())->filter(
      function ($routes) {
        return $routes->getName() && in_array(
          'web',
          $routes->middleware()
        );
      }
    );

    $created = 0;
    $skipped = 0;

    foreach ($routes as $route) {
      $permission = Permission::firstOrCreate([
        'name' => $route->getName()
      ]);

      if ($permission->wasRecentlyCreated) {
        $this->info(
          "✅ permission created: " . $route->getName()
        );

        $created++;
      } else {
        $this->warn(
          "⚠️ permission already exists: " . $route->getName()
        );

        $skipped++;
      }
    }

    $this->info(
      "🎉 permission generate completed
        created: $created
        skipped: $skipped
      "
    );
  }
}
