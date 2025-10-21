<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Manageuser\Permission;
use Illuminate\Support\Facades\Route;

class RoutePermission extends Command
{
  protected $signature = 'permission:cpr';
  protected $description = 'Create permission routes';

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
