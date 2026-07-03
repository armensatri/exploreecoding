<?php

namespace Database\Seeders\View;

use App\Models\Manageuser\User;
use App\Models\Programming\Path;
use App\Models\View\Pathview;
use Illuminate\Database\Seeder;

class PathviewSeeder extends Seeder
{
  public function run(): void
  {
    $users = User::pluck('id');
    $paths = Path::pluck('id');

    foreach ($users as $userId) {

      // Setiap user melihat 3 path secara acak
      $randomPaths = $paths->random(3);

      foreach ($randomPaths as $pathId) {

        Pathview::firstOrCreate([
          'user_id' => $userId,
          'path_id' => $pathId,
        ]);
      }
    }
  }
}
