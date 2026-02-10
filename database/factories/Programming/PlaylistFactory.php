<?php

namespace Database\Factories\Programming;

use App\Helpers\RandomUrl;
use App\Models\Programming\Roadmap;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlaylistFactory extends Factory
{
  public function definition(): array
  {
    return [
      'status_id' => mt_rand(1, 3),
      'roadmap_id' => Roadmap::factory(),
      'spl' => $this->faker->numberBetween(1, 100),
      'name' => $this->faker->sentence(2, false),
      'slug' => $this->faker->slug(),
      'description' => $this->faker->paragraph(),
      'url' => RandomUrl::generateUrl()
    ];
  }
}
