<?php

namespace Database\Seeders\Managemenu;

use App\Models\Managemenu\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
  public function run(): void
  {
    $menus = [
      [
        'sm' => 1,
        'name' => 'owner',
        'slug' => 'owner',
        'description' => 'menu owner'
      ],

      [
        'sm' => 2,
        'name' => 'superadmin',
        'slug' => 'superadmin',
        'description' => 'menu superadmin'
      ],

      [
        'sm' => 3,
        'name' => 'admin',
        'slug' => 'admin',
        'description' => 'menu admin'
      ],

      [
        'sm' => 4,
        'name' => 'writing',
        'slug' => 'writing',
        'description' => 'menu writing'
      ],

      [
        'sm' => 5,
        'name' => 'editor',
        'slug' => 'editor',
        'description' => 'menu editor'
      ],

      [
        'sm' => 6,
        'name' => 'member',
        'slug' => 'member',
        'description' => 'menu member'
      ],

      [
        'sm' => 7,
        'name' => 'account',
        'slug' => 'account',
        'description' => 'menu account user'
      ],

      [
        'sm' => 8,
        'name' => 'managedata',
        'slug' => 'managedata',
        'description' => 'menu pengelolaan data'
      ],

      [
        'sm' => 9,
        'name' => 'manageuser',
        'slug' => 'manageuser',
        'description' => 'menu pengelolaan user'
      ],

      [
        'sm' => 10,
        'name' => 'managemenu',
        'slug' => 'managemenu',
        'description' => 'menu pengelolaan menu'
      ],

      [
        'sm' => 11,
        'name' => 'published',
        'slug' => 'published',
        'description' => 'menu pengelolaan data publish'
      ],

      [
        'sm' => 12,
        'name' => 'programming',
        'slug' => 'programming',
        'description' => 'menu pengelolaan data programming'
      ],
    ];

    foreach ($menus as $menu) {
      Menu::create($menu);
    }
  }
}
