<?php

namespace Database\Factories\Programming;

use App\Helpers\RandomUrl;
use App\Models\Programming\Path;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoadmapFactory extends Factory
{
  public function definition(): array
  {
    return [
      'status_id' => mt_rand(1, 3),
      'path_id' => Path::factory(),
      'sr' => $this->faker->numberBetween(1, 100),
      'name' => $this->faker->sentence(2, false),
      'slug' => $this->faker->slug(),
      'description' => $this->faker->paragraph(),
      'url' => RandomUrl::generateUrl()
    ];
  }
}
