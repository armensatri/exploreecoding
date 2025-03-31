<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Programming\Path;
use App\Models\Programming\Post;
use App\Models\Programming\Roadmap;
use App\Models\Programming\Playlist;

class ProgrammingSeeder extends Seeder
{
  public function run(): void
  {
    Path::factory(4)
      ->recycle(Path::all())
      ->has(
        Roadmap::factory(2)
          ->recycle(Roadmap::all())
          ->has(
            Playlist::factory(4)
              ->recycle(Playlist::all())
              ->has(
                Post::factory(10)
                  ->recycle(Post::all())
              )
          )
      )
      ->create();
  }
}
