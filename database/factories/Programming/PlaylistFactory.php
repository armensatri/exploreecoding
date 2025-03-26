<?php

namespace Database\Factories\Programming;

use App\Models\Programming\Roadmap;
use App\Models\Programming\Playlist;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlaylistFactory extends Factory
{
  protected $model = Playlist::class;

  private static int $splCounter = 1;

  public function definition(): array
  {
    return [
      'roadmap_id' => Roadmap::factory(),
      'spl' => self::$splCounter++,
      'name' => $this->faker->unique()->sentence(3, false),
      'slug'  => $this->faker->unique()->slug(3, false),
      'status_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
    ];
  }
}
