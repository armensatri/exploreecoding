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
        'name' => 'member',
        'description' => 'menu dashboard member'
      ],

      [
        'sm' => 5,
        'name' => 'account',
        'description' => 'menu account'
      ],

      [
        'sm' => 6,
        'name' => 'manageaccess',
        'description' => 'menu manage access'
      ],

      [
        'sm' => 7,
        'name' => 'managedata',
        'description' => 'menu monitoring data'
      ],

      [
        'sm' => 8,
        'name' => 'manageuser',
        'description' => 'menu access user'
      ],

      [
        'sm' => 9,
        'name' => 'managemenu',
        'description' => 'menu access menu'
      ],

      [
        'sm' => 10,
        'name' => 'published',
        'description' => 'menu published content'
      ],

      [
        'sm' => 11,
        'name' => 'programming',
        'description' => 'menu content programming'
      ],

      [
        'sm' => 12,
        'name' => 'comments',
        'description' => 'menu comments'
      ],
    ];

    foreach ($menus as $menu) {
      Menu::create($menu);
    }
  }
}
