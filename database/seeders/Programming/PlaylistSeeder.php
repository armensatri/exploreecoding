<?php

namespace Database\Seeders\Programming;

use Illuminate\Database\Seeder;
use App\Models\Programming\Playlist;

class PlaylistSeeder extends Seeder
{
  public function run(): void
  {
    $playlists = [
      [
        'roadmap_id' => 1,
        'spl' => 1,
        'name' => 'Intro Getstarted',
        'slug' => 'intro-getstarted',
        'status_id' => 5,
      ],

      [
        'roadmap_id' => 2,
        'spl' => 1,
        'name' => 'Intro Algoritma',
        'slug' => 'intro-algoritma',
        'status_id' => 1,
      ],

      [
        'roadmap_id' => 3,
        'spl' => 1,
        'name' => 'Intro Struktur Data',
        'slug' => 'intro-struktur-data',
        'status_id' => 3,
      ],

      [
        'roadmap_id' => 4,
        'spl' => 1,
        'name' => 'Intro Pemograman',
        'slug' => 'intro-pemograman',
        'status_id' => 1,
      ],
    ];

    foreach ($playlists as $playlist) {
      Playlist::create($playlist);
    }
  }
}
