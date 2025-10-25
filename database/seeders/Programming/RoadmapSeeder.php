<?php

namespace Database\Seeders\Programming;

use Illuminate\Database\Seeder;
use App\Models\Programming\Roadmap;
use App\Models\Published\Status;

class RoadmapSeeder extends Seeder
{
  public function run(): void
  {
    $roadmaps = [
      // PATH 1 GETSTARTED
      [
        'status_id' => mt_rand(1, 5),
        'path_id' => 1,
        'sr' => 1,
        'name' => 'Getstarted Introduction',
        'slug' => 'getstarted-introduction',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel recusandae est error velit natus! Ducimus.'
      ],

      // PATH 2 ALGORITMA
      [
        'status_id' => mt_rand(1, 5),
        'path_id' => 2,
        'sr' => 1,
        'name' => 'Algoritma Introduction',
        'slug' => 'algoritma-introduction',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel recusandae est error velit natus! Ducimus.'
      ],
      [
        'status_id' => mt_rand(1, 5),
        'path_id' => 2,
        'sr' => 2,
        'name' => 'Programming Pundamental',
        'slug' => 'programming-pundamental',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel recusandae est error velit natus! Ducimus.'
      ],

      // PATH 3 STRUKTUR DATA
      [
        'status_id' => mt_rand(1, 5),
        'path_id' => 3,
        'sr' => 1,
        'name' => 'Struktur Data Introduction',
        'slug' => 'struktur-data-introduction',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel recusandae est error velit natus! Ducimus.'
      ],
      [
        'status_id' => mt_rand(1, 5),
        'path_id' => 3,
        'sr' => 2,
        'name' => 'Struktur Data Basic',
        'slug' => 'struktur-data-basic',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel recusandae est error velit natus! Ducimus.'
      ],

      // PATH 4 PEMOGRAMAN
      [
        'status_id' => mt_rand(1, 5),
        'path_id' => 4,
        'sr' => 1,
        'name' => 'Pemograman Introduction',
        'slug' => 'pemograman-introduction',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel recusandae est error velit natus! Ducimus.'
      ],
      [
        'status_id' => mt_rand(1, 5),
        'path_id' => 4,
        'sr' => 2,
        'name' => 'Pengenalan Pemograman',
        'slug' => 'pengenalan-pemograman',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel recusandae est error velit natus! Ducimus.'
      ],

      // PATH 5 FRONTEND
      [
        'status_id' => mt_rand(1, 5),
        'path_id' => 5,
        'sr' => 1,
        'name' => 'Frontend Introduction',
        'slug' => 'frontend-introduction',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel recusandae est error velit natus! Ducimus.'
      ],
      [
        'status_id' => mt_rand(1, 5),
        'path_id' => 5,
        'sr' => 2,
        'name' => 'Internet',
        'slug' => 'internet',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel recusandae est error velit natus! Ducimus.'
      ],
    ];

    foreach ($roadmaps as $roadmap) {
      Roadmap::create($roadmap);
    }
  }
}
