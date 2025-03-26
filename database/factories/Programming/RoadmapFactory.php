<?php

namespace Database\Factories\Programming;

use App\Models\Programming\Path;
use App\Models\Programming\Roadmap;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoadmapFactory extends Factory
{
  protected $model = Roadmap::class;

  private static int $srCounter = 1;

  public function definition(): array
  {
    return [
      'path_id' => Path::factory(),
      'sr' => self::$srCounter++,
      'name' => $this->faker->unique()->sentence(3, false),
      'slug'  => $this->faker->unique()->slug(3, false),
      'status_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
    ];
  }
}
