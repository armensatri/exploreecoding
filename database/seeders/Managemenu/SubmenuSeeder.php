<?php

namespace Database\Seeders\Managemenu;

use Illuminate\Database\Seeder;
use App\Models\Managemenu\Submenu;

class SubmenuSeeder extends Seeder
{
  public function run(): void
  {
    $submenus = [
      // ID 1 OWNER
      [
        'menu_id' => 1,
        'ssm' => 1,
        'name' => 'owner',
        'slug' => 'owner',
        'route' => '/owner',
        'active' => 'owner',
        'routename' => '/owner',
        'description' => 'dashboard owner'
      ],

      // ID 2 SUPERADMIN
      [
        'menu_id' => 2,
        'ssm' => 1,
        'name' => 'superadmin',
        'slug' => 'superadmin',
        'route' => '/superadmin',
        'active' => 'superadmin',
        'routename' => '/superadmin',
        'description' => 'dashboard superadmin'
      ],

      // ID 3 ADMIN
      [
        'menu_id' => 3,
        'ssm' => 1,
        'name' => 'creator',
        'slug' => 'creator',
        'route' => '/creator',
        'active' => 'creator',
        'routename' => '/creator',
        'description' => 'dashboard creator'
      ],

      // ID 4 MEMBER
      [
        'menu_id' => 4,
        'ssm' => 1,
        'name' => 'member',
        'slug' => 'member',
        'route' => '/member',
        'active' => 'member',
        'routename' => '/member',
        'description' => 'dashboard admin'
      ],

      // ID 5 ACCOUNT
      [
        'menu_id' => 5,
        'ssm' => 1,
        'name' => 'profile',
        'slug' => 'profile',
        'route' => '/profile',
        'active' => 'profile',
        'routename' => '/profile',
        'description' => 'my profile'
      ],

      [
        'menu_id' => 5,
        'ssm' => 2,
        'name' => 'personal',
        'slug' => 'personal',
        'route' => '/personal',
        'active' => 'personal',
        'routename' => '/personal',
        'description' => 'profile personal public'
      ],

      [
        'menu_id' => 5,
        'ssm' => 3,
        'name' => 'changepassword',
        'slug' => 'changepassword',
        'route' => '/changepassword',
        'active' => 'changepassword',
        'routename' => '/changepassword',
        'description' => 'change password user'
      ],

      // ID 6 MANAGEDATA
      [
        'menu_id' => 6,
        'ssm' => 1,
        'name' => 'data',
        'slug' => 'data',
        'route' => '/data',
        'active' => 'data',
        'routename' => '/data',
        'description' => 'data system'
      ],
      [
        'menu_id' => 6,
        'ssm' => 2,
        'name' => 'visitor',
        'slug' => 'visitor',
        'route' => '/visitor',
        'active' => 'visitor',
        'routename' => '/visitor',
        'description' => 'data user visitor'
      ],
      [
        'menu_id' => 6,
        'ssm' => 3,
        'name' => 'access',
        'slug' => 'access',
        'route' => '/access',
        'active' => 'access',
        'routename' => '/access',
        'description' => 'data access system'
      ],
      [
        'menu_id' => 6,
        'ssm' => 4,
        'name' => 'statistic',
        'slug' => 'statistic',
        'route' => '/statistic',
        'active' => 'statistic',
        'routename' => '/statistic',
        'description' => 'data statistic system'
      ],

      // ID 7 MANAGEUSER
      [
        'menu_id' => 7,
        'ssm' => 1,
        'name' => 'users',
        'slug' => 'users',
        'route' => '/users',
        'active' => 'users',
        'routename' => '/users',
        'description' => 'data users'
      ],
      [
        'menu_id' => 7,
        'ssm' => 2,
        'name' => 'roles',
        'slug' => 'roles',
        'route' => '/roles',
        'active' => 'roles',
        'routename' => '/roles',
        'description' => 'data roles'
      ],
      [
        'menu_id' => 7,
        'ssm' => 3,
        'name' => 'permissions',
        'slug' => 'permissions',
        'route' => '/permissions',
        'active' => 'permissions',
        'routename' => '/permissions',
        'description' => 'data permissions'
      ],

      // ID 8 MANAGEMENU
      [
        'menu_id' => 8,
        'ssm' => 1,
        'name' => 'menus',
        'slug' => 'menus',
        'route' => '/menus',
        'active' => 'menus',
        'routename' => '/menus',
        'description' => 'data menus'
      ],
      [
        'menu_id' => 8,
        'ssm' => 2,
        'name' => 'submenus',
        'slug' => 'submenus',
        'route' => '/submenus',
        'active' => 'submenus',
        'routename' => '/submenus',
        'description' => 'data submenus'
      ],

      // ID 9 PUBLISHED
      [
        'menu_id' => 9,
        'ssm' => 1,
        'name' => 'statuses',
        'slug' => 'statuses',
        'route' => '/statuses',
        'active' => 'statuses',
        'routename' => '/statuses',
        'description' => 'data statuses'
      ],

      // ID 10 PROGRAMMING
      [
        'menu_id' => 10,
        'ssm' => 1,
        'name' => 'paths',
        'slug' => 'paths',
        'route' => '/paths',
        'active' => 'paths',
        'routename' => '/paths',
        'description' => 'data paths'
      ],

      [
        'menu_id' => 10,
        'ssm' => 2,
        'name' => 'roadmaps',
        'slug' => 'roadmaps',
        'route' => '/roadmaps',
        'active' => 'roadmaps',
        'routename' => '/roadmaps',
        'description' => 'data roadmaps'
      ],

      [
        'menu_id' => 10,
        'ssm' => 3,
        'name' => 'playlists',
        'slug' => 'playlists',
        'route' => '/playlists',
        'active' => 'playlists',
        'routename' => '/playlists',
        'description' => 'data playlists'
      ],

      [
        'menu_id' => 10,
        'ssm' => 4,
        'name' => 'posts',
        'slug' => 'posts',
        'route' => '/posts',
        'active' => 'posts',
        'routename' => '/posts',
        'description' => 'data posts'
      ],

      [
        'menu_id' => 11,
        'ssm' => 1,
        'name' => 'tipscodings',
        'slug' => 'tipscodings',
        'route' => '/tipscodings',
        'active' => 'tipscodings',
        'routename' => '/tipscodings',
        'description' => 'data tips coding'
      ],

      [
        'menu_id' => 11,
        'ssm' => 2,
        'name' => 'categories',
        'slug' => 'categories',
        'route' => '/categories',
        'active' => 'categories',
        'routename' => '/categories',
        'description' => 'data category tips coding'
      ],
    ];

    foreach ($submenus as $submenu) {
      Submenu::create($submenu);
    }
  }
}
