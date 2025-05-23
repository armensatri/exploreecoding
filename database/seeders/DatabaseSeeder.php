<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Published\StatusSeeder;

use Database\Seeders\Manageuser\{
  PermissionSeeder,
  RoleSeeder,
  UserSeeder
};

use Database\Seeders\Managemenu\{
  MenuSeeder,
  SubmenuSeeder
};

use Database\Seeders\Pivot\{
  RoleHasMenuSeeder,
  RoleHasPermissionSeeder,
  RoleHasSubmenuSeeder,
};

use Database\Seeders\Programming\{
  PathSeeder,
  PlaylistSeeder,
  PostSeeder,
  RoadmapSeeder,
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
      PathSeeder::class,
      RoadmapSeeder::class,
      PlaylistSeeder::class,
      PostSeeder::class,
    ]);
  }
}
