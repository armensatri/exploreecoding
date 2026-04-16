<?php

namespace Database\Seeders\Tipscoding;

use App\Helpers\RandomUrl;
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
        'url' => RandomUrl::generateUrl(),
      ],

      [
        'id' => 2,
        'sc' => 2,
        'name' => 'css',
        'slug' => 'css',
        'url' => RandomUrl::generateUrl(),
      ],

      [
        'id' => 3,
        'sc' => 3,
        'name' => 'javascript',
        'slug' => 'javascript',
        'url' => RandomUrl::generateUrl(),
      ],
    ];

    foreach ($categories as $category) {
      Category::create($category);
    }
  }
}
