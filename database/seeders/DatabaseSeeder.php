<?php

namespace Database\Seeders;

use App\Models\Programming\Path;
use App\Models\Programming\Playlist;
use App\Models\Programming\Post;
use App\Models\Programming\Roadmap;
use Illuminate\Database\Seeder;
use Database\Seeders\Published\StatusSeeder;

use Database\Seeders\Manageuser\{
  UserSeeder,
  RoleSeeder,
  PermissionSeeder,
};

use Database\Seeders\Managemenu\{
  MenuSeeder,
  SubmenuSeeder,
  ExploreSeeder,
  NavigationSeeder,
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
      ExploreSeeder::class,
      NavigationSeeder::class,
      // PathSeeder::class,
      // RoadmapSeeder::class,
      // PlaylistSeeder::class,
      // PostSeeder::class,
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
      )
      ->create();
  }
}
