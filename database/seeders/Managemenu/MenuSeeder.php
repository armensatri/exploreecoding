<?php

namespace Database\Seeders\Managemenu;

use App\Helpers\RandomUrl;
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
        'slug' => 'owner',
        'description' => 'menu owner',
        'url' => RandomUrl::generateUrl()
      ],

      [
        'sm' => 2,
        'name' => 'superadmin',
        'slug' => 'superadmin',
        'description' => 'menu superadmin',
        'url' => RandomUrl::generateUrl()
      ],

      [
        'sm' => 3,
        'name' => 'creator',
        'slug' => 'creator',
        'description' => 'menu creator',
        'url' => RandomUrl::generateUrl()
      ],

      [
        'sm' => 4,
        'name' => 'member',
        'slug' => 'member',
        'description' => 'menu member',
        'url' => RandomUrl::generateUrl()
      ],

      [
        'sm' => 5,
        'name' => 'account',
        'slug' => 'account',
        'description' => 'menu account user',
        'url' => RandomUrl::generateUrl()
      ],

      [
        'sm' => 6,
        'name' => 'managedata',
        'slug' => 'managedata',
        'description' => 'menu pengelolaan data',
        'url' => RandomUrl::generateUrl()
      ],

      [
        'sm' => 7,
        'name' => 'manageuser',
        'slug' => 'manageuser',
        'description' => 'menu pengelolaan user',
        'url' => RandomUrl::generateUrl()
      ],

      [
        'sm' => 8,
        'name' => 'managemenu',
        'slug' => 'managemenu',
        'description' => 'menu pengelolaan menu',
        'url' => RandomUrl::generateUrl()
      ],

      [
        'sm' => 9,
        'name' => 'published',
        'slug' => 'published',
        'description' => 'menu pengelolaan data publish',
        'url' => RandomUrl::generateUrl()
      ],

      [
        'sm' => 10,
        'name' => 'programming',
        'slug' => 'programming',
        'description' => 'menu pengelolaan data programming',
        'url' => RandomUrl::generateUrl()
      ],

      [
        'sm' => 11,
        'name' => 'tipscoding',
        'slug' => 'tipscoding',
        'description' => 'menu tips coding dan programming',
        'url' => RandomUrl::generateUrl()
      ],
    ];

    foreach ($menus as $menu) {
      Menu::create($menu);
    }
  }
}
