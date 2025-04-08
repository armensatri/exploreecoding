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
        'roadmap_id' => 0,
        'spl' => 1,
        'name' => 'intro getstarted',
        'slug' => 'intro-getstarted',
        'status_id' => 0,
      ],

      [
        'roadmap_id' => 0,
        'spl' => 1,
        'name' => 'intro getstarted',
        'slug' => 'intro-getstarted',
        'status_id' => 0,
      ],

      [
        'roadmap_id' => 0,
        'spl' => 1,
        'name' => 'intro getstarted',
        'slug' => 'intro-getstarted',
        'status_id' => 0,
      ],

      [
        'roadmap_id' => 0,
        'spl' => 1,
        'name' => 'intro getstarted',
        'slug' => 'intro-getstarted',
        'status_id' => 0,
      ],

      [
        'roadmap_id' => 0,
        'spl' => 1,
        'name' => 'intro getstarted',
        'slug' => 'intro-getstarted',
        'status_id' => 0,
      ],
    ];

    foreach ($playlists as $playlist) {
      Playlist::create($playlist);
    }
  }
}
