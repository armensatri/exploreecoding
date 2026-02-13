<?php

namespace Database\Factories\Tipscoding;

use App\Helpers\RandomUrl;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
  public function definition(): array
  {
    return [
      'sc' => $this->faker->numberBetween(1, 20),
      'name' => $this->faker->sentence(1, false),
      'slug' => $this->faker->slug(1, false),
      'url' => RandomUrl::generateUrl()
    ];
  }
}
