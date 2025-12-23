<?php

namespace Database\Factories\Tipscoding;

use App\Helpers\RandomUrl;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
  public function definition(): array
  {
    return [
      'sc' => $this->faker->numberBetween(1, 100),
      'name' => $this->faker->sentence(2, false),
      'slug' => $this->faker->slug(),
      'url' => RandomUrl::generateUrl()
    ];
  }
}
