<?php

namespace Database\Seeders\Managemenu;

use Illuminate\Database\Seeder;
use App\Models\Managemenu\Menu;

class MenuSeeder extends Seeder
{
  public function run(): void
  {
    $menus = [
      [
        'sm' => 1,
        'name' => 'home',
        'slug' => 'home',
        'description' => 'menu home',
      ],

      [
        'sm' => 2,
        'name' => 'account',
        'slug' => 'account',
        'description' => 'menu account user',
      ],

      [
        'sm' => 3,
        'name' => 'managedata',
        'slug' => 'managedata',
        'description' => 'menu pengelolaan data',
      ],

      [
        'sm' => 4,
        'name' => 'manageuser',
        'slug' => 'manageuser',
        'description' => 'menu pengelolaan user',
      ],

      [
        'sm' => 5,
        'name' => 'managemenu',
        'slug' => 'managemenu',
        'description' => 'menu pengelolaan menu',
      ],

      [
        'sm' => 6,
        'name' => 'published',
        'slug' => 'published',
        'description' => 'menu pengelolaan data publish',
      ],

      [
        'sm' => 7,
        'name' => 'programming',
        'slug' => 'programming',
        'description' => 'menu pengelolaan data programming',
      ],

      [
        'sm' => 8,
        'name' => 'tipscoding',
        'slug' => 'tipscoding',
        'description' => 'menu tips coding dan programming',
      ],
    ];

    foreach ($menus as $menu) {
      Menu::create($menu);
    }
  }
}
