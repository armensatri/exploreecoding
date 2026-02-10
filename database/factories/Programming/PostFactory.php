<?php

namespace Database\Factories\Programming;

use App\Helpers\RandomUrl;
use App\Models\Programming\Playlist;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
  public function definition(): array
  {
    return [
      'user_id' => mt_rand(1, 4),
      'status_id' => mt_rand(1, 3),
      'playlist_id' => Playlist::factory(),
      'sp' => $this->faker->numberBetween(1, 100),
      'title' => $this->faker->sentence(),
      'slug' => $this->faker->slug(),
      'excerpt' => $this->faker->sentence(20),
      'content' => $this->faker->paragraphs(4, true),
      'url' => RandomUrl::generateUrl()
    ];
  }
}
