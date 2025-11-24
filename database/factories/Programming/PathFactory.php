<?php

namespace Database\Factories\Programming;

use App\Helpers\RandomUrl;
use Illuminate\Database\Eloquent\Factories\Factory;

class PathFactory extends Factory
{
  public function definition(): array
  {
    return [
      'status_id' => mt_rand(1, 3),
      'sp' => $this->faker->numberBetween(1, 100),
      'name' => $this->faker->sentence(3),
      'slug' => $this->faker->slug,
      'description' => $this->faker->paragraph(),
      'image' => $this->faker->imageUrl(),
      'url' => RandomUrl::generateUrl()
    ];
  }
}
