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
        'description' => 'menu owner'
      ],

      [
        'sm' => 2,
        'name' => 'superadmin',
        'description' => 'menu superadmin'
      ],

      [
        'sm' => 3,
        'name' => 'admin',
        'description' => 'menu admin'
      ],

      [
        'sm' => 4,
        'name' => 'concreat',
        'description' => 'menu content creator'
      ],

      [
        'sm' => 5,
        'name' => 'member',
        'description' => 'menu member'
      ],

      [
        'sm' => 6,
        'name' => 'account',
        'description' => 'menu acount user'
      ],

      [
        'sm' => 7,
        'name' => 'managedata',
        'description' => 'menu pengelolaan data'
      ],

      [
        'sm' => 8,
        'name' => 'manageuser',
        'description' => 'menu pengelolaan user'
      ],

      [
        'sm' => 9,
        'name' => 'managemenu',
        'description' => 'menu pengelolaan menu'
      ],

      [
        'sm' => 10,
        'name' => 'published',
        'description' => 'menu status publish'
      ],

      [
        'sm' => 11,
        'name' => 'programming',
        'description' => 'menu pengelolaan content'
      ],

      [
        'sm' => 12,
        'name' => 'comment',
        'description' => 'menu commentar content'
      ],
    ];

    foreach ($menus as $menu) {
      Menu::create($menu);
    }
  }
}
