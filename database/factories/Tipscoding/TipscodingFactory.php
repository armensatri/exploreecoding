<?php

namespace Database\Factories\Tipscoding;

use App\Helpers\RandomUrl;
use App\Models\Manageuser\User;
use App\Models\Tipscoding\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipscodingFactory extends Factory
{
  public function definition(): array
  {
    return [
      'user_id' => mt_rand(1, 4),
      'category_id' => mt_rand(1, 20),
      'title' => $this->faker->sentence(5, false),
      'slug' => $this->faker->slug(5, false),
      'excerpt' => $this->faker->sentence(20),
      'content' => $this->faker->paragraphs(4, true),
      'image' => $this->faker->imageUrl(),
      'url' => RandomUrl::generateUrl()
    ];
  }
}
