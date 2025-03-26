<?php

namespace Database\Factories\Programming;

use App\Models\Programming\Path;
use Illuminate\Database\Eloquent\Factories\Factory;

class PathFactory extends Factory
{
  protected $model = Path::class;

  private static int $spCounter = 1;

  public function definition(): array
  {
    return [
      'sp' => self::$spCounter++,
      'name' => $this->faker->unique()->sentence(3, false),
      'slug'  => $this->faker->unique()->slug(3, false),
      'status_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
    ];
  }
}
