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
        'description' => 'exploreecoding adalah platform pembelajaran coding yang menawarkan berbagai kursus dan seri terbaru untuk meningkatkan keterampilan pemrograman anda'
      ],

      [
        'sp' => 2,
        'name' => 'Algoritma',
        'slug' => 'algoritma',
        'status_id' => 1,
        'description' => 'algoritma adalah langkah-langkah sistematis untuk menyelesaikan masalah atau tugas, sering digunakan dalam pemrograman dan analisis data'
      ],

      [
        'sp' => 3,
        'name' => 'Struktur Data',
        'slug' => 'struktur-data',
        'status_id' => 3,
        'description' => 'struktur data adalah cara mengorganisir dan menyimpan data untuk efisiensi akses dan pengolahan dalam pemrograman'
      ],

      [
        'sp' => 4,
        'name' => 'Programming',
        'slug' => 'programming',
        'status_id' => 4,
        'description' => 'programming adalah proses menulis kode untuk membuat perangkat lunak, aplikasi, atau sistem yang menjalankan tugas tertentu'
      ],

      [
        'sp' => 5,
        'name' => 'Frontend',
        'slug' => 'frontend',
        'status_id' => 5,
        'description' => 'frontend adalah bagian antarmuka pengguna dari aplikasi web, mencakup desain, interaksi, dan pengalaman pengguna yang terlihat'
      ],

      [
        'sp' => 6,
        'name' => 'Backend',
        'slug' => 'backend',
        'status_id' => 1,
        'description' => 'backend adalah bagian server dari aplikasi mengelola logika, basis data, dan komunikasi antara server atau clien'
      ],

      [
        'sp' => 7,
        'name' => 'DBMS',
        'slug' => 'dbms',
        'status_id' => 1,
        'description' => 'database management system adalah perangkat lunak untuk mengelola data, menyimpan data, dan mengakses data dalam basis data secara efisien'
      ],

      [
        'sp' => 8,
        'name' => 'NodeJS',
        'slug' => 'nodejs',
        'status_id' => 1,
        'description' => 'nodejs adalah platform open source untuk menjalankan Javascript runtime di server, mendukung pengembangan aplikasi web yang cepat dan efisien'
      ],

      [
        'sp' => 9,
        'name' => 'Bahasa Pemograman',
        'slug' => 'bahasa-pemograman',
        'status_id' => 1,
        'description' => 'bahasa pemrograman adalah sistem sintaksis untuk menulis instruksi yang dapat dipahami komputer, digunakan untuk mengembangkan perangkat lunak'
      ],

      [
        'sp' => 10,
        'name' => 'Package Manager',
        'slug' => 'package-manager',
        'status_id' => 1,
        'description' => 'package manager adalah alat yang di gunakan untuk mengelola instalasi, pembaruan, dan penghapusan paket perangkat lunak dalam proyek pemrograman secara otomatis'
      ],

      [
        'sp' => 11,
        'name' => 'Framework',
        'slug' => 'framework',
        'status_id' => 1,
        'description' => 'framework adalah kerangka kerja yang menyediakan struktur dan alat untuk mempercepat pengembangan aplikasi dengan standar dan praktik terbaik'
      ],

      [
        'sp' => 12,
        'name' => 'Library',
        'slug' => 'library',
        'status_id' => 1,
        'description' => 'library adalah kumpulan kode dan fungsi siap pakai yang memudahkan pengembang dalam membangun aplikasi tanpa menulis dari awal'
      ],

      [
        'sp' => 13,
        'name' => 'Fullstack',
        'slug' => 'fullstack',
        'status_id' => 1,
        'description' => 'fullstack adalah pengembang yang menguasai baik frontend maupun backend, mampu membangun aplikasi web secara menyeluruh dari awal hingga akhir'
      ],

      [
        'sp' => 14,
        'name' => 'Techstack',
        'slug' => 'techstack',
        'status_id' => 1,
        'description' => 'techstack adalah kombinasi teknologi, bahasa pemrograman, dan alat yang digunakan untuk mengembangkan aplikasi atau sistem perangkat lunak'
      ],

      [
        'sp' => 15,
        'name' => 'Rest Api',
        'slug' => 'rest-api',
        'status_id' => 1,
        'description' => 'rest api adalah antarmuka yang memungkinkan komunikasi antara clien dan server menggunakan protokol http untuk mengakses dan memanipulasi data'
      ],

      [
        'sp' => 16,
        'name' => 'Documentasi',
        'slug' => 'documentasi',
        'status_id' => 1,
        'description' => 'dokumentasi adalah kemampuan atau memahami untuk membaca dan menginterpretasikan informasi teknis untuk menggunakan perangkat lunak atau alat dengan efektif'
      ],
    ];

    foreach ($paths as $path) {
      Path::create($path);
    }
  }
}
