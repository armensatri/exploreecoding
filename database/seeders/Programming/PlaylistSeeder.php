<?php

namespace Database\Seeders\Programming;

use App\Models\Programming\Playlist;
use Illuminate\Database\Seeder;

class PlaylistSeeder extends Seeder
{
  public function run(): void
  {
    $playlists = [
      [
        'roadmap_id' => 1,
        'spl' => 1,
        'name' => '',
        'slug' => '',
        'status_id' => 1,
      ],

      [
        'roadmap_id' => 2,
        'spl' => 0,
        'name' => '',
        'slug' => '',
        'status_id' => 1,
      ],

      [
        'roadmap_id' => 3,
        'spl' => 0,
        'name' => '',
        'slug' => '',
        'status_id' => 1,
      ],

      [
        'roadmap_id' => 4,
        'spl' => 0,
        'name' => '',
        'slug' => '',
        'status_id' => 1,
      ],

      [
        'roadmap_id' => 5,
        'spl' => 0,
        'name' => '',
        'slug' => '',
        'status_id' => 1,
      ],

      [
        'roadmap_id' => 6,
        'spl' => 0,
        'name' => '',
        'slug' => '',
        'status_id' => 1,
      ],

      [
        'roadmap_id' => 0,
        'spl' => 0,
        'name' => '',
        'slug' => '',
        'status_id' => 1,
      ],
    ];

    foreach ($playlists as $playlist) {
      Playlist::create($playlist);
    }
  }
}
