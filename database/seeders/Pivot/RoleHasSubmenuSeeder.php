<?php

namespace Database\Seeders\Pivot;

use Illuminate\Database\Seeder;
use App\Models\Manageuser\Role;
use App\Models\Managemenu\Submenu;

class RoleHasSubmenuSeeder extends Seeder
{
  public function run(): void
  {
    $roles = Role::whereIn('name', [
      'owner',
      'superadmin',
      'admin',
      'concreat',
      'member'
    ])->get()->keyBy('name');

    $submenus = Submenu::whereIn('name', [
      // MENU ACCOUNT
      'profile',
      'profile public',
      'profile edit',
      'change password',

      // MENU MANAGEDATA
      'data',
      'access',
      'device',
      'visitor',
      'content',
      'statistic',

      // MENU MANAGEUSER
      'users',
      'roles',
      'permissions',

      // MENU MANAGEMENU
      'menus',
      'submenus',

      // MENU PUBLISHED
      'statuses',

      // MENU PROGRAMMING
      'paths',
      'roadmaps',
      'playlists',
      'posts',

      // MENU COMMENT
      'comments'
    ])->get()->keyBy('name');

    $roleHasSubmenus = [
      'owner' => [
        // MENU ACCOUNT
        'profile',
        'profile public',
        'profile edit',
        'change password',

        // MENU MANAGEDATA
        'data',
        'access',
        'device',
        'visitor',
        'content',
        'statistic',

        // MENU MANAGEUSER
        'users',
        'roles',
        'permissions',

        // MENU MANAGEMENU
        'menus',
        'submenus',

        // MENU PUBLISHED
        'statuses',

        // MENU PROGRAMMING
        'paths',
        'roadmaps',
        'playlists',
        'posts',

        // MENU COMMENT
        'comments'
      ],

      'superadmin' => [
        // MENU ACCOUNT
        'profile',
        'profile public',
        'profile edit',
        'change password',

        // MENU MANAGEDATA
        'data',
        'access',
        'device',
        'visitor',
        'content',
        'statistic',

        // MENU MANAGEUSER
        'users',
        'roles',
        'permissions',

        // MENU MANAGEMENU
        'menus',
        'submenus',

        // MENU PUBLISHED
        'statuses',

        // MENU PROGRAMMING
        'paths',
        'roadmaps',
        'playlists',
        'posts',

        // MENU COMMENT
        'comments'
      ],

      'admin' => [
        // MENU ACCOUNT
        'profile',
        'profile public',
        'profile edit',
        'change password',

        // MENU MANAGEDATA
        // 'data',
        // 'access',
        // 'device',
        // 'visitor',
        // 'content',
        // 'statistic',

        // MENU MANAGEUSER
        // 'users',
        // 'roles',
        // 'permissions',

        // MENU MANAGEMENU
        // 'menus',
        // 'submenus',

        // MENU PUBLISHED
        // 'statuses',

        // MENU PROGRAMMING
        'paths',
        'roadmaps',
        'playlists',
        'posts',

        // MENU COMMENT
        // 'comments'
      ],

      'concreat' => [
        // MENU ACCOUNT
        'profile',
        'profile public',
        'profile edit',
        'change password',

        // MENU MANAGEDATA
        // 'data',
        // 'access',
        // 'device',
        // 'visitor',
        // 'content',
        // 'statistic',

        // MENU MANAGEUSER
        // 'users',
        // 'roles',
        // 'permissions',

        // MENU MANAGEMENU
        // 'menus',
        // 'submenus',

        // MENU PUBLISHED
        // 'statuses',

        // MENU PROGRAMMING
        'paths',
        'roadmaps',
        'playlists',
        'posts',

        // MENU COMMENT
        // 'comments'
      ],

      'member' => [
        // MENU ACCOUNT
        'profile',
        'profile public',
        'profile edit',
        'change password',

        // MENU MANAGEDATA
        // 'data',
        // 'access',
        // 'device',
        // 'visitor',
        // 'content',
        // 'statistic',

        // MENU MANAGEUSER
        // 'users',
        // 'roles',
        // 'permissions',

        // MENU MANAGEMENU
        // 'menus',
        // 'submenus',

        // MENU PUBLISHED
        // 'statuses',

        // MENU PROGRAMMING
        // 'paths',
        // 'roadmaps',
        // 'playlists',
        // 'posts',

        // MENU COMMENT
        // 'comments'
      ],
    ];

    foreach ($roleHasSubmenus as $roleName => $submenuNames) {
      if (isset($roles[$roleName])) {
        $roles[$roleName]->submenus()->attach(
          collect($submenuNames)->mapWithKeys(
            fn($name) => [
              $submenus[$name]->id => []
            ]
          )
        );
      }
    }
  }
}
