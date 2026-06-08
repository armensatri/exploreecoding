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
        'status_id' => 1,
        'sp' => 1,
        'name' => 'Getstarted',
        'slug' => 'getstarted',
        'description' => 'Panduan lengkap untuk pemula agar memahami konsep dasar pemrograman dan menyiapkan fondasi kuat sebelum melangkah lebih jauh',
      ],

      [
        'status_id' => 2,
        'sp' => 2,
        'name' => 'Algoritma',
        'slug' => 'algoritma',
        'description' => 'Pelajari dasar algoritma untuk memahami logika berpikir pemrograman dan membangun solusi yang efisien serta terstruktur',
      ],

      [
        'status_id' => 3,
        'sp' => 3,
        'name' => 'Struktur Data',
        'slug' => 'struktur-data',
        'description' => 'Pelajari konsep struktur data untuk memahami cara menyimpan, mengelola, dan memproses data secara efisien dalam pemrograman modern',
      ],

      [
        'status_id' => 1,
        'sp' => 4,
        'name' => 'Pemograman',
        'slug' => 'pemograman',
        'description' => 'Pelajari dasar-dasar pemrograman untuk memahami logika, sintaks, dan cara membangun aplikasi dari konsep hingga implementasi',
      ],

      [
        'status_id' => 2,
        'sp' => 5,
        'name' => 'Frontend',
        'slug' => 'frontend',
        'description' => 'Jelajahi dunia frontend dan kuasai cara membangun antarmuka web modern yang interaktif, responsif, menarik, serta memberikan pengalaman pengguna yang optimal',
      ],
    ];

    foreach ($paths as $path) {
      Path::create($path);
    }
  }
}
