<?php

namespace Database\Seeders\Programming;

use Illuminate\Database\Seeder;
use App\Models\Programming\Roadmap;

class RoadmapSeeder extends Seeder
{
  public function run(): void
  {
    $roadmaps = [
      // PATH ID 1 GETSTARTED
      [
        'path_id' => 1,
        'sr' => 1,
        'name' => 'Getstarted Introduction',
        'slug' => '1gt-getstarted-introduction',
        'status_id' => 1,
      ],

      // PATH ID 2 ALGORITMA
      [
        'path_id' => 2,
        'sr' => 1,
        'name' => 'Algoritma Introduction',
        'slug' => '2alg-algoritma-introduction',
        'status_id' => 1,
      ],
      [
        'path_id' => 2,
        'sr' => 2,
        'name' => 'Programming Fundamental',
        'slug' => '2alg-programming-fundamental',
        'status_id' => 1,
      ],
      [
        'path_id' => 2,
        'sr' => 3,
        'name' => 'Complexity',
        'slug' => '2alg-complexity',
        'status_id' => 1,
      ],

      // PATH ID 3 STRUKTUR DATA
      [
        'path_id' => 3,
        'sr' => 1,
        'name' => 'Struktur Data introduction',
        'slug' => '3sd-struktur-data-introduction',
        'status_id' => 1,
      ],
      [
        'path_id' => 3,
        'sr' => 2,
        'name' => 'Struktur Data Basic',
        'slug' => '3sd-struktur-data-basic',
        'status_id' => 1,
      ],
      [
        'path_id' => 3,
        'sr' => 3,
        'name' => 'Struktur Data Tree',
        'slug' => '3sd-struktur-data-tree',
        'status_id' => 1,
      ],

      // PATH ID 4 PEMOGRAMAN
      [
        'path_id' => 4,
        'sr' => 1,
        'name' => 'Pemograman Introduction',
        'slug' => '4prg-pemograman-introduction',
        'status_id' => 1,
      ],
      [
        'path_id' => 4,
        'sr' => 2,
        'name' => 'Pengenalan Pemograman',
        'slug' => '4prg-pengenalan-pemograman',
        'status_id' => 1,
      ],
      [
        'path_id' => 4,
        'sr' => 3,
        'name' => 'Jalur Pemograman',
        'slug' => '4prg-jalur-pemograman',
        'status_id' => 1,
      ],

      // PATH ID 5 FRONTEND
      [
        'path_id' => 5,
        'sr' => 1,
        'name' => 'Frontend Introduction',
        'slug' => '5fe-frontend-introduction',
        'status_id' => 1,
      ],
      [
        'path_id' => 5,
        'sr' => 2,
        'name' => 'Internet',
        'slug' => '5fe-internet',
        'status_id' => 1,
      ],
      [
        'path_id' => 5,
        'sr' => 3,
        'name' => 'Basic Tools',
        'slug' => '5fe-basic-tools',
        'status_id' => 1,
      ],

      // PATH ID 6 BACKEND
      [
        'path_id' => 6,
        'sr' => 1,
        'name' => 'Backend Introduction',
        'slug' => '6be-backend-introduction',
        'status_id' => 1,
      ],
      [
        'path_id' => 6,
        'sr' => 2,
        'name' => 'Learn a Language',
        'slug' => '6be-learn-a-language',
        'status_id' => 1,
      ],
      [
        'path_id' => 6,
        'sr' => 3,
        'name' => 'Version Control System',
        'slug' => '6be-version-control-system',
        'status_id' => 1,
      ],

      // PATH ID 7 DBMS
      [
        'path_id' => 7,
        'sr' => 1,
        'name' => 'DBMS Introduction',
        'slug' => '7db-dbms-introduction',
        'status_id' => 1,
      ],
      [
        'path_id' => 7,
        'sr' => 2,
        'name' => 'Basis Data',
        'slug' => '7db-basis-data',
        'status_id' => 1,
      ],
      [
        'path_id' => 7,
        'sr' => 3,
        'name' => 'Database Dasar',
        'slug' => '7db-database-dasar',
        'status_id' => 1,
      ],

      // PATH ID 8 NODEJS
      [
        'path_id' => 8,
        'sr' => 1,
        'name' => 'Nodejs Introduction',
        'slug' => '8nj-nodejs-introduction',
        'status_id' => 1,
      ],
      [
        'path_id' => 8,
        'sr' => 2,
        'name' => 'Module',
        'slug' => '8nj-module',
        'status_id' => 1,
      ],
      [
        'path_id' => 8,
        'sr' => 3,
        'name' => 'NPM',
        'slug' => '8nj-npm',
        'status_id' => 1,
      ],

      // PATH ID 9 BAHASA PEMOGRAMAN
      [
        'path_id' => 9,
        'sr' => 1,
        'name' => 'Bahasa Pemograman Introduction',
        'slug' => '9bhs-bahasa-pemograman-introduction',
        'status_id' => 1,
      ],
      [
        'path_id' => 9,
        'sr' => 2,
        'name' => 'PHP',
        'slug' => '9bhs-php',
        'status_id' => 1,
      ],
      [
        'path_id' => 9,
        'sr' => 3,
        'name' => 'Javascript',
        'slug' => '9bhs-javascript',
        'status_id' => 1,
      ],

      // PATH ID 10 FRAMEWORK
      [
        'path_id' => 10,
        'sr' => 1,
        'name' => 'Framework Introduction',
        'slug' => '10fw-framework-introduction',
        'status_id' => 1,
      ],
      [
        'path_id' => 10,
        'sr' => 2,
        'name' => 'Framework PHP',
        'slug' => '10fw-framework-php',
        'status_id' => 1,
      ],
      [
        'path_id' => 10,
        'sr' => 3,
        'name' => 'Framework Javascript',
        'slug' => '10fw-framework-javascript',
        'status_id' => 1,
      ],

      // PATH ID 11 REST API
      [
        'path_id' => 11,
        'sr' => 1,
        'name' => 'Rest Api Introduction',
        'slug' => '11ra-rest-api-introduction',
        'status_id' => 1,
      ],
      [
        'path_id' => 11,
        'sr' => 2,
        'name' => 'Learn The Basic',
        'slug' => '11ra-learn-the-basic',
        'status_id' => 1,
      ],
      [
        'path_id' => 11,
        'sr' => 3,
        'name' => 'Berbagai Gaya Api',
        'slug' => '11ra-berbagai-gaya-api',
        'status_id' => 1,
      ],

      // PATH ID 12 FULLSTACK
      [
        'path_id' => 12,
        'sr' => 1,
        'name' => 'Fullstack Framework Introduction',
        'slug' => '12fs-fullstack-framework-introduction',
        'status_id' => 1,
      ],
      [
        'path_id' => 12,
        'sr' => 2,
        'name' => 'Fullstack Framework PHP',
        'slug' => '12fs-fullstack-framework-php',
        'status_id' => 1,
      ],
      [
        'path_id' => 12,
        'sr' => 3,
        'name' => 'Fullstack Framework Javascript',
        'slug' => '12fs-fullstack-framework-javascript',
        'status_id' => 1,
      ],

      // PATH ID 13 TECHSCTACK
      [
        'path_id' => 13,
        'sr' => 1,
        'name' => 'Techstack Introduction',
        'slug' => '13ts-techstack-introduction',
        'status_id' => 1,
      ],
      [
        'path_id' => 13,
        'sr' => 2,
        'name' => 'Techstack TALLS',
        'slug' => '13ts-techstack-talls',
        'status_id' => 1,
      ],
      [
        'path_id' => 13,
        'sr' => 3,
        'name' => 'Techstack RILTS',
        'slug' => '13ts-techstack-rilts',
        'status_id' => 1,
      ],
    ];

    foreach ($roadmaps as $roadmap) {
      Roadmap::create($roadmap);
    }
  }
}
