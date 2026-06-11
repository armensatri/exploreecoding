<?php

namespace Database\Seeders\Tipscoding;

use Illuminate\Database\Seeder;
use App\Models\Tipscoding\Category;

class CategorySeeder extends Seeder
{
  public function run(): void
  {
    $categories = [
      [
        'id' => 1,
        'sc' => 1,
        'name' => 'html',
        'slug' => 'html',
      ],

      [
        'id' => 2,
        'sc' => 2,
        'name' => 'css',
        'slug' => 'css',
      ],

      [
        'id' => 3,
        'sc' => 3,
        'name' => 'javascript',
        'slug' => 'javascript',
      ],
    ];

    foreach ($categories as $category) {
      Category::create($category);
    }
  }
}
