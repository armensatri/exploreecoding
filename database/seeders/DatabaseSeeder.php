<?php

namespace Database\Seeders;

// use App\Models\Tipscoding\{Category, Tipscoding};
use Database\Seeders\Managemenu\MenuSeeder;
use Database\Seeders\Managemenu\SubmenuSeeder;
use Database\Seeders\Manageuser\PermissionSeeder;
use Database\Seeders\Manageuser\RoleSeeder;
use Database\Seeders\Manageuser\UserSeeder;
use Database\Seeders\Pivot\RoleHasMenuSeeder;
use Database\Seeders\Pivot\RoleHasPermissionSeeder;
use Database\Seeders\Pivot\RoleHasSubmenuSeeder;
use Database\Seeders\Programming\PathSeeder;
use Database\Seeders\Programming\PlaylistSeeder;
use Database\Seeders\Programming\PostSeeder;
use Database\Seeders\Programming\RoadmapSeeder;
use Database\Seeders\Published\StatusSeeder;
use Database\Seeders\Tipscoding\CategorySeeder;
use Database\Seeders\Tipscoding\TipscodingSeeder;
use Database\Seeders\View\PathviewSeeder;
use Database\Seeders\View\TipscodingviewSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  use WithoutModelEvents;

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
      CategorySeeder::class,
      TipscodingSeeder::class,
      PathviewSeeder::class,
    ]);

    // Path::factory()
    //   ->count(5)
    //   ->has(
    //     Roadmap::factory()
    //       ->count(4)
    //       ->has(
    //         Playlist::factory()
    //           ->count(3)
    //           ->has(
    //             Post::factory()->count(10)
    //           )
    //       )
    //   )->create();

    // Category::factory()->count(20)->create();
    // Tipscoding::factory()->count(80)->create();

    $this->call(TipscodingviewSeeder::class);
  }
}
