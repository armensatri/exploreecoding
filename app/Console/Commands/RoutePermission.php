<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Manageuser\Permission;
use Illuminate\Support\Facades\Route;

class RoutePermission extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'permission:cpr';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Create permission routes';

  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   */
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
