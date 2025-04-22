<?php

namespace Database\Seeders\Programming;

use App\Models\Programming\Playlist;
use App\Models\Programming\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
  public function run(): void
  {
    $playlists = Playlist::all();

    foreach ($playlists as $playlist) {
      Post::factory()
        ->count(7)
        ->sequence(fn($sequence) => ['sp' => $sequence->index + 1])
        ->create([
          'playlist_id' => $playlist->id,
        ]);
    }
  }
}
