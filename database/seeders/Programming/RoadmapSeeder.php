<?php

namespace Database\Seeders\Programming;

use Illuminate\Database\Seeder;
use App\Models\Programming\Roadmap;

class RoadmapSeeder extends Seeder
{
  public function run(): void
  {
    $roadmaps = [
      [
        'path_id' => 1,
        'sr' => 1,
        'name' => 'Getstarted Introduction',
        'slug' => 'getstarted-introduction',
        'status_id' => 1
      ],

      [
        'path_id' => 2,
        'sr' => 1,
        'name' => 'Algoritma Introduction',
        'slug' => 'algoritma-introduction',
        'status_id' => 1
      ],

      [
        'path_id' => 3,
        'sr' => 1,
        'name' => 'Struktur Data Introduction',
        'slug' => 'struktur-data-introduction',
        'status_id' => 3
      ],

      [
        'path_id' => 4,
        'sr' => 1,
        'name' => 'Pemograman Introduction',
        'slug' => 'pemograman-introduction',
        'status_id' => 4
      ],

      [
        'path_id' => 5,
        'sr' => 1,
        'name' => 'Frontend Introduction',
        'slug' => 'frontend-introduction',
        'status_id' => 5
      ],
      [
        'path_id' => 5,
        'sr' => 2,
        'name' => 'Internet',
        'slug' => 'internet',
        'status_id' => 4
      ],
    ];

    foreach ($roadmaps as $roadmap) {
      Roadmap::create($roadmap);
    }
  }
}
