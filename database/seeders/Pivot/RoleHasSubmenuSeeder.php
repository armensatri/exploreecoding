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
      'creator',
      'member',
    ])->get()->keyBy('name');

    $submenus = Submenu::whereIn('name', [
      // OWNER
      'owner',

      // SUPERADMIN
      'superadmin',

      // CREATOR
      'creator',

      // MEMBER
      'member',

      // ACCOUNT
      'profile',
      'personal',
      'changepassword',

      // MANAGEDATA
      'data',
      'visitor',
      'access',
      'statistic',

      // MANAGEUSER
      'users',
      'roles',
      'permissions',

      // MANAGEMENU
      'menus',
      'submenus',

      // PIBLISHED
      'statuses',

      // PROGRAMMING
      'paths',
      'roadmaps',
      'playlists',
      'posts',
    ])->get()->keyBy('name');

    $roleHasSubmenus = [
      'owner' => [
        // OWNER
        'owner',

        // SUPERADMIN
        // 'superadmin',

        // CREATOR
        // 'creator',

        // MEMBER
        // 'member',

        // ACCOUNT
        'profile',
        'personal',
        'changepassword',

        // MANAGEDATA
        'data',
        'visitor',
        'access',
        'statistic',

        // MANAGEUSER
        'users',
        'roles',
        'permissions',

        // MANAGEMENU
        'menus',
        'submenus',

        // PIBLISHED
        'statuses',

        // PROGRAMMING
        'paths',
        'roadmaps',
        'playlists',
        'posts',
      ],

      'superadmin' => [
        // OWNER
        // 'owner',

        // SUPERADMIN
        'superadmin',

        // CREATOR
        // 'creator',

        // MEMBER
        // 'member',

        // ACCOUNT
        'profile',
        'personal',
        'changepassword',

        // MANAGEDATA
        'data',
        'visitor',
        'access',
        'statistic',

        // MANAGEUSER
        'users',
        'roles',
        'permissions',

        // MANAGEMENU
        'menus',
        'submenus',

        // PIBLISHED
        'statuses',

        // PROGRAMMING
        'paths',
        'roadmaps',
        'playlists',
        'posts',
      ],

      'creator' => [
        // OWNER
        // 'owner',

        // SUPERADMIN
        // 'superadmin',

        // CREATOR
        'creator',

        // MEMBER
        // 'member',

        // ACCOUNT
        'profile',
        'personal',
        'changepassword',

        // MANAGEDATA
        // 'data',
        // 'visitor',
        // 'access',
        // 'statistic',

        // MANAGEUSER
        // 'users',
        // 'roles',
        // 'permissions',

        // MANAGEMENU
        // 'menus',
        // 'submenus',

        // PIBLISHED
        // 'statuses',

        // PROGRAMMING
        // 'paths',
        // 'roadmaps',
        // 'playlists',
        'posts',
      ],

      'member' => [
        // OWNER
        // 'owner',

        // SUPERADMIN
        // 'superadmin',

        // CREATOR
        // 'creator',

        // MEMBER
        'member',

        // ACCOUNT
        'profile',
        'personal',
        'changepassword',

        // MANAGEDATA
        // 'data',
        // 'visitor',
        // 'access',
        // 'statistic',

        // MANAGEUSER
        // 'users',
        // 'roles',
        // 'permissions',

        // MANAGEMENU
        // 'menus',
        // 'submenus',

        // PIBLISHED
        // 'statuses',

        // PROGRAMMING
        // 'paths',
        // 'roadmaps',
        // 'playlists',
        // 'posts',
      ],
    ];

    foreach ($roleHasSubmenus as $roleName => $submenuNames) {
      if (isset($roles[$roleName])) {
        $submenuIds = collect($submenuNames)
          ->filter(fn($name) => isset($submenus[$name]))
          ->map(fn($name) => $submenus[$name]->id)
          ->toArray();

        $roles[$roleName]->submenus()->syncWithoutDetaching($submenuIds);
      }
    }
  }
}
