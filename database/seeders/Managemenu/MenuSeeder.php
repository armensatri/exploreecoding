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
        'name' => 'owner',
        'description' => 'menu dashboard owner'
      ],

      [
        'sm' => 2,
        'name' => 'superadmin',
        'description' => 'menu dashboard superadmin'
      ],

      [
        'sm' => 3,
        'name' => 'admin',
        'description' => 'menu dashboard admin'
      ],

      [
        'sm' => 4,
        'name' => 'concreat',
        'description' => 'menu dashboard content creator'
      ],

      [
        'sm' => 5,
        'name' => 'member',
        'description' => 'menu dashboard member'
      ],

      [
        'sm' => 6,
        'name' => 'account',
        'description' => 'menu account'
      ],

      [
        'sm' => 7,
        'name' => 'manageaccess',
        'description' => 'menu manage access'
      ],

      [
        'sm' => 8,
        'name' => 'managedata',
        'description' => 'menu monitoring data'
      ],

      [
        'sm' => 9,
        'name' => 'manageuser',
        'description' => 'menu access user'
      ],

      [
        'sm' => 10,
        'name' => 'managemenu',
        'description' => 'menu access menu'
      ],

      [
        'sm' => 11,
        'name' => 'publish',
        'description' => 'menu publish content'
      ],

      [
        'sm' => 12,
        'name' => 'programming',
        'description' => 'menu content programming'
      ],

      [
        'sm' => 13,
        'name' => 'comments',
        'description' => 'menu comment'
      ],
    ];

    foreach ($menus as $menu) {
      Menu::create($menu);
    }
  }
}
