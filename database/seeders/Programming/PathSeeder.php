<?php

namespace Database\Seeders\Programming;

use Illuminate\Database\Seeder;
use App\Models\Programming\Path;

class PathSeeder extends Seeder
{
  public function run(): void
  {
    $paths = [
      [
        'sp' => 1,
        'name' => 'Getstarted',
        'slug' => 'getstarted',
        'status_id' => 1,
        'image' => url('/public/path/1 - getstarted.jpg')
      ],

      [
        'sp' => 2,
        'name' => 'Algoritma',
        'slug' => 'algoritma',
        'status_id' => 1,
        'image' => url('/public/path/2 - algoritma.png')
      ],

      [
        'sp' => 3,
        'name' => 'Struktur Data',
        'slug' => 'struktur-data',
        'status_id' => 1,
        'image' => url('/public/path/3 - struktur data.png')
      ],

      [
        'sp' => 4,
        'name' => 'Pemograman',
        'slug' => 'pemograman',
        'status_id' => 1,
        'image' => url('/public/path/4 - pemograman.png')
      ],

      [
        'sp' => 5,
        'name' => 'Frontend',
        'slug' => 'frontend',
        'status_id' => 1,
        'image' => url('/public/path/5 - frontend.png')
      ],

      [
        'sp' => 6,
        'name' => 'Backend',
        'slug' => 'backend',
        'status_id' => 1,
        'image' => url('/public/path/6 - backend.png')
      ],

      [
        'sp' => 7,
        'name' => 'DBMS',
        'slug' => 'dbms',
        'status_id' => 1,
        'image' => url('/public/path/7 - dbms.png')
      ],

      [
        'sp' => 8,
        'name' => 'NodeJS',
        'slug' => 'nodejs',
        'status_id' => 1,
        'image' => url('/public/path/8 - nodejs.png')
      ],

      [
        'sp' => 9,
        'name' => 'Bahasa Pemograman',
        'slug' => 'bahasa-pemograman',
        'status_id' => 1,
        'image' => url('/public/path/9 - bhsprg.png')
      ],

      [
        'sp' => 10,
        'name' => 'Framework',
        'slug' => 'framework',
        'status_id' => 1,
        'image' => url('/public/path/10 - framework.png')
      ],

      [
        'sp' => 11,
        'name' => 'Rest Api',
        'slug' => 'rest-api',
        'status_id' => 1,
        'image' => url('/public/path/11 - rest api.png')
      ],

      [
        'sp' => 12,
        'name' => 'Fullstack',
        'slug' => 'fullstack',
        'status_id' => 1,
        'image' => url('/public/path/12 - fullstack.png')
      ],

      [
        'sp' => 13,
        'name' => 'Techstack',
        'slug' => 'techstack',
        'status_id' => 1,
        'image' => url('/public/path/13 - techstack.png')
      ],

      [
        'sp' => 14,
        'name' => 'Package Manager',
        'slug' => 'package-manager',
        'status_id' => 1,
        'image' => url('/public/path/14 - pkgmngr.png')
      ],

      [
        'sp' => 15,
        'name' => 'Library',
        'slug' => 'library',
        'status_id' => 1,
        'image' => url('/public/path/15 - library.png')
      ],

      [
        'sp' => 16,
        'name' => 'Documentasi',
        'slug' => 'documentasi',
        'status_id' => 1,
        'image' => url('/public/path/16 - doc.png')
      ],
    ];

    foreach ($paths as $path) {
      Path::create($path);
    }
  }
}
