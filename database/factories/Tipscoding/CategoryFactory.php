<?php

namespace Database\Factories\Tipscoding;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
  public function definition(): array
  {
    return [
      'sc' => $this->faker->numberBetween(1, 20),
      'name' => strtolower($this->faker->sentence(2, false)),
      'slug' => $this->faker->slug(2, false),
    ];
  }
}
