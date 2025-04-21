<?php

namespace Database\Seeders\Managemenu;

use Illuminate\Database\Seeder;
use App\Models\Managemenu\Submenu;

class SubmenuSeeder extends Seeder
{
  public function run(): void
  {
    $submenus = [
      // MENU OWNER
      [
        'menu_id' => 1,
        'ssm' => 1,
        'name' => 'owner',
        'route' => '/owner',
        'active' => 'owner',
        'routename' => '/owner',
        'description' => 'dashboard owner'
      ],

      // MENU SUPERADMIN
      [
        'menu_id' => 2,
        'ssm' => 1,
        'name' => 'superadmin',
        'route' => '/superadmin',
        'active' => 'superadmin',
        'routename' => '/superadmin',
        'description' => 'dashboard superadmin'
      ],

      // MENU ADMIN
      [
        'menu_id' => 3,
        'ssm' => 1,
        'name' => 'admin',
        'route' => '/admin',
        'active' => 'admin',
        'routename' => '/admin',
        'description' => 'dashboard admin'
      ],

      // MENU CONCREAT
      [
        'menu_id' => 4,
        'ssm' => 1,
        'name' => 'concreat',
        'route' => '/concreat',
        'active' => 'concreat',
        'routename' => '/concreat',
        'description' => 'dashboard content creator'
      ],

      // MENU MEMBER
      [
        'menu_id' => 5,
        'ssm' => 1,
        'name' => 'member',
        'route' => '/member',
        'active' => 'member',
        'routename' => '/member',
        'description' => 'dashboard member'
      ],

      // MENU ACCOUNT
      [
        'menu_id' => 6,
        'ssm' => 1,
        'name' => 'profile',
        'route' => '/profile',
        'active' => 'profile',
        'routename' => '/profile',
        'description' => 'personal profile'
      ],
      [
        'menu_id' => 6,
        'ssm' => 2,
        'name' => 'profile public',
        'route' => '/profile/public',
        'active' => 'profile/public',
        'routename' => '/profile/public',
        'description' => 'profile public'
      ],
      [
        'menu_id' => 6,
        'ssm' => 3,
        'name' => 'profile edit',
        'route' => '/profile/edit',
        'active' => 'profile/edit',
        'routename' => '/profile/edit',
        'description' => 'edit profile pengguna'
      ],
      [
        'menu_id' => 6,
        'ssm' => 4,
        'name' => 'change password',
        'route' => '/change/password/edit',
        'active' => 'change/password/edit',
        'routename' => '/change/password/edit',
        'description' => 'change password pengguna'
      ],

      // MENU MANAGEDATA
      [
        'menu_id' => 7,
        'ssm' => 1,
        'name' => 'data',
        'route' => '/data',
        'active' => 'data',
        'routename' => '/data',
        'description' => 'data monitoring'
      ],
      [
        'menu_id' => 7,
        'ssm' => 2,
        'name' => 'access',
        'route' => '/access',
        'active' => 'access',
        'routename' => '/access',
        'description' => 'pemantauan access system'
      ],
      [
        'menu_id' => 7,
        'ssm' => 3,
        'name' => 'device',
        'route' => '/device',
        'active' => 'device',
        'routename' => '/device',
        'description' => 'device pengguna'
      ],
      [
        'menu_id' => 7,
        'ssm' => 4,
        'name' => 'visitor',
        'route' => '/visitor',
        'active' => 'visitor',
        'routename' => '/visitor',
        'description' => 'user pengunjung'
      ],
      [
        'menu_id' => 7,
        'ssm' => 5,
        'name' => 'content',
        'route' => '/content',
        'active' => 'content',
        'routename' => '/content',
        'description' => 'content programming'
      ],
      [
        'menu_id' => 7,
        'ssm' => 6,
        'name' => 'statistic',
        'route' => '/statistic',
        'active' => 'statistic',
        'routename' => '/statistic',
        'description' => 'statistic data'
      ],

      // MENU MANAGEUSER
      [
        'menu_id' => 8,
        'ssm' => 1,
        'name' => 'users',
        'route' => '/users',
        'active' => 'users',
        'routename' => '/users',
        'description' => 'data user'
      ],
      [
        'menu_id' => 8,
        'ssm' => 2,
        'name' => 'roles',
        'route' => '/roles',
        'active' => 'roles',
        'routename' => '/roles',
        'description' => 'data role'
      ],
      [
        'menu_id' => 8,
        'ssm' => 3,
        'name' => 'permissions',
        'route' => '/permissions',
        'active' => 'permissions',
        'routename' => '/permissions',
        'description' => 'data permission'
      ],

      // MENU MANAGEMENU
      [
        'menu_id' => 9,
        'ssm' => 1,
        'name' => 'menus',
        'route' => '/menus',
        'active' => 'menus',
        'routename' => '/menus',
        'description' => 'data menu'
      ],
      [
        'menu_id' => 9,
        'ssm' => 2,
        'name' => 'submenus',
        'route' => '/submenus',
        'active' => 'submenus',
        'routename' => '/submenus',
        'description' => 'data submenu'
      ],

      // MENU PUBLISHED
      [
        'menu_id' => 10,
        'ssm' => 1,
        'name' => 'statuses',
        'route' => '/statuses',
        'active' => 'statuses',
        'routename' => '/statuses',
        'description' => 'data status publish'
      ],

      // MENU PROGRAMMING
      [
        'menu_id' => 11,
        'ssm' => 1,
        'name' => 'paths',
        'route' => '/paths',
        'active' => 'paths',
        'routename' => '/paths',
        'description' => 'data path'
      ],
      [
        'menu_id' => 11,
        'ssm' => 2,
        'name' => 'roadmaps',
        'route' => '/roadmaps',
        'active' => 'roadmaps',
        'routename' => '/roadmaps',
        'description' => 'data roadmap'
      ],
      [
        'menu_id' => 11,
        'ssm' => 3,
        'name' => 'playlists',
        'route' => '/playlists',
        'active' => 'playlists',
        'routename' => '/playlists',
        'description' => 'data playlist'
      ],
      [
        'menu_id' => 11,
        'ssm' => 4,
        'name' => 'posts',
        'route' => '/posts',
        'active' => 'posts',
        'routename' => '/posts',
        'description' => 'data post'
      ],

      // MENU COMMENT
      [
        'menu_id' => 12,
        'ssm' => 1,
        'name' => 'comments',
        'route' => '/comments',
        'active' => 'comments',
        'routename' => '/comments',
        'description' => 'data comment'
      ],
    ];

    foreach ($submenus as $submenu) {
      Submenu::create($submenu);
    }
  }
}
