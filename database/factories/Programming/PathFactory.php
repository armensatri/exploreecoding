<?php

namespace Database\Factories\Programming;

use Illuminate\Database\Eloquent\Factories\Factory;

class PathFactory extends Factory
{
  public function definition(): array
  {
    return [
      'status_id' => mt_rand(1, 3),
      'sp' => $this->faker->numberBetween(1, 100),
      'name' => $this->faker->sentence(2, false),
      'slug' => $this->faker->slug(2, false),
      'description' => $this->faker->paragraph(),
    ];
  }
}
