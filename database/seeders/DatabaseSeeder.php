<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Published\StatusSeeder;

use App\Models\Programming\{
  Path,
  Playlist,
  Post,
  Roadmap
};

use App\Models\Tipscoding\{
  Category,
  Tipscoding,
};

use Database\Seeders\Manageuser\{
  UserSeeder,
  RoleSeeder,
  PermissionSeeder,
};

use Database\Seeders\Managemenu\{
  MenuSeeder,
  SubmenuSeeder,
};

use Database\Seeders\Pivot\{
  RoleHasMenuSeeder,
  RoleHasSubmenuSeeder,
  RoleHasPermissionSeeder,
};

use Database\Seeders\Programming\{
  PathSeeder,
  RoadmapSeeder,
  PlaylistSeeder,
  PostSeeder,
};

use Database\Seeders\Tipscoding\{
  CategorySeeder,
  TipscodingSeeder,
};

class DatabaseSeeder extends Seeder
{
  public function run(): void
  {
    $this->call([
      RoleSeeder::class,
      UserSeeder::class,
      MenuSeeder::class,
      SubmenuSeeder::class,
      RoleHasMenuSeeder::class,
      RoleHasSubmenuSeeder::class,
      PermissionSeeder::class,
      RoleHasPermissionSeeder::class,
      StatusSeeder::class,
      // PathSeeder::class,
      // RoadmapSeeder::class,
      // PlaylistSeeder::class,
      // PostSeeder::class,
      CategorySeeder::class,
      TipscodingSeeder::class
    ]);

    Path::factory()
      ->count(5)
      ->has(
        Roadmap::factory()
          ->count(4)
          ->has(
            Playlist::factory()
              ->count(3)
              ->has(
                Post::factory()->count(10)
              )
          )
      )->create();

    // Category::factory()->count(20)->create();
    // Tipscoding::factory()->count(80)->create();
  }
}
