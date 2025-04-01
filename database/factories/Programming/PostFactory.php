<?php

namespace Database\Factories\Programming;

use App\Models\Programming\Post;
use App\Models\Programming\Playlist;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
  protected $model = Post::class;

  private static int $spCounter = 1;

  public function definition(): array
  {
    return [
      'playlist_id' => Playlist::factory(),
      'sp' => self::$spCounter++,
      'title' => $this->faker->sentence(5, false),
      'slug'  => $this->faker->unique()->slug(5, false),
      'excerpt' => $this->faker->paragraphs(1, true),
      'content' => $this->faker->paragraphs(20, true),
      'status_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
    ];
  }
}
