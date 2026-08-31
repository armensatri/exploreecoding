<?php

namespace Database\Seeders\Monitoring;

use App\Models\Manageuser\User;
use App\Models\Monitoring\Pathview;
use App\Models\Programming\Path;
use Illuminate\Database\Seeder;

class PathviewSeeder extends Seeder
{
  public function run(): void
  {
    $users = User::pluck('id');

    $paths = Path::select('id', 'name')->get();

    foreach ($users as $userId) {

      // Setiap user melihat 3 path secara acak
      $randomPaths = $paths->random(3);

      foreach ($randomPaths as $path) {

        Pathview::firstOrCreate(
          [
            'user_id' => $userId,
            'path_id' => $path->id,
          ],
          [
            'path_name' => $path->name,
          ]
        );
      }
    }
  }
}
