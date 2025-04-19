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
        'routename' => 'owner',
        'description' => 'dashboard owner'
      ],

      // MENU SUPERADMIN
      [
        'menu_id' => 2,
        'ssm' => 1,
        'name' => 'superadmin',
        'route' => '/superadmin',
        'active' => 'superadmin',
        'routename' => 'superadmin',
        'description' => 'dashboard superadmin'
      ],

      // MENU ADMIN
      [
        'menu_id' => 3,
        'ssm' => 1,
        'name' => 'admin',
        'route' => '/admin',
        'active' => 'admin',
        'routename' => 'admin',
        'description' => 'dashboard admin'
      ],

      // MENU CONCREAT
      [
        'menu_id' => 4,
        'ssm' => 1,
        'name' => 'concreat',
        'route' => '/concreat',
        'active' => 'concreat',
        'routename' => 'concreat',
        'description' => 'dashboard content creator'
      ],

      // MENU MEMBER
      [
        'menu_id' => 5,
        'ssm' => 0,
        'name' => 'member',
        'route' => '/member',
        'active' => 'member',
        'routename' => 'member',
        'description' => 'dashboard member'
      ],

      // MENU ACCOUNT
      [
        'menu_id' => 6,
        'ssm' => 1,
        'name' => 'profile',
        'route' => '/profile',
        'active' => 'profile',
        'routename' => 'profile',
        'description' => 'personal profile'
      ],
      [
        'menu_id' => 6,
        'ssm' => 2,
        'name' => 'profile public',
        'route' => '/profile/public',
        'active' => 'profile/public',
        'routename' => 'profile.public',
        'description' => 'personal profile public'
      ],
      [
        'menu_id' => 6,
        'ssm' => 3,
        'name' => 'profile edit',
        'route' => '/profile/edit',
        'active' => 'profile/edit',
        'routename' => 'profile.edit',
        'description' => 'edit profile'
      ],
      [
        'menu_id' => 6,
        'ssm' => 4,
        'name' => 'change password',
        'route' => '/change/password/edit',
        'active' => '/change/password/edit',
        'routename' => 'change.password.edit',
        'description' => ''
      ],

      // MENU MANAGEDATA
      [
        'menu_id' => 7,
        'ssm' => 0,
        'name' => '',
        'route' => '',
        'active' => '',
        'routename' => '',
        'description' => ''
      ],

      // MENU MANAGEUSER
      [
        'menu_id' => 8,
        'ssm' => 0,
        'name' => '',
        'route' => '',
        'active' => '',
        'routename' => '',
        'description' => ''
      ],

      // MENU MANAGEMENU
      [
        'menu_id' => 9,
        'ssm' => 0,
        'name' => '',
        'route' => '',
        'active' => '',
        'routename' => '',
        'description' => ''
      ],

      // MENU PUBLISHED
      [
        'menu_id' => 10,
        'ssm' => 0,
        'name' => '',
        'route' => '',
        'active' => '',
        'routename' => '',
        'description' => ''
      ],

      // MENU PROGRAMMING
      [
        'menu_id' => 11,
        'ssm' => 0,
        'name' => '',
        'route' => '',
        'active' => '',
        'routename' => '',
        'description' => ''
      ],

      // MENU COMMENT
      [
        'menu_id' => 12,
        'ssm' => 0,
        'name' => '',
        'route' => '',
        'active' => '',
        'routename' => '',
        'description' => ''
      ],
    ];

    foreach ($submenus as $submenu) {
      Submenu::create($submenu);
    }
  }
}
