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
      // HOME
      'dashboard',

      // ACCOUNT
      'profile',
      'personal',
      'changepassword',

      // MANAGEDATA
      'data',
      'visitor',
      'access',
      'statistic',
      'view',

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

      // tipscoding
      'tipscodings',
      'categories',
    ])->get()->keyBy('name');

    $roleHasSubmenus = [
      'owner' => [
        // HOME
        'dashboard',

        // ACCOUNT
        'profile',
        'personal',
        'changepassword',

        // MANAGEDATA
        'data',
        'visitor',
        'access',
        'statistic',
        'view',

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

        // tipscoding
        'tipscodings',
        'categories',
      ],

      'superadmin' => [
        // HOME
        'dashboard',

        // ACCOUNT
        'profile',
        'personal',
        'changepassword',

        // MANAGEDATA
        'data',
        'visitor',
        'access',
        'statistic',
        'view',

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

        // tipscoding
        'tipscodings',
        'categories',
      ],

      'creator' => [
        // HOME
        'dashboard',

        // ACCOUNT
        'profile',
        'personal',
        'changepassword',

        // MANAGEDATA
        // 'data',
        // 'visitor',
        // 'access',
        // 'statistic',
        // 'view',

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

        // tipscoding
        'tipscodings',
        'categories',
      ],

      'member' => [
        // HOME
        'dashboard',

        // ACCOUNT
        'profile',
        'personal',
        'changepassword',

        // MANAGEDATA
        // 'data',
        // 'visitor',
        // 'access',
        // 'statistic',
        // 'view',

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

        // tipscoding
        // 'tipscodings',
        // 'categories',
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
