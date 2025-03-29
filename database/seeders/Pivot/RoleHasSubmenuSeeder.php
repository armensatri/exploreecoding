<?php

namespace Database\Seeders\Pivot;

use App\Models\Managemenu\Submenu;
use Illuminate\Database\Seeder;
use App\Models\Manageuser\Role;

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
      'profile',
      'edit profile',
      'change password',

      'menu',
      'submenu',
      'permission',

      'device',
      'visitor',
      'silabus',
      'statistik',
      'countdata',

      'users',
      'roles',
      'permissions',

      'menus',
      'submenus',

      'statuses',

      'paths',
      'roadmaps',
      'playlists',
      'posts',

      'comments'
    ])->get()->keyBy('name');

    $rolHasSubmenus = [
      'owner' => [
        'profile',
        'edit profile',
        'change password',

        'menu',
        'submenu',
        'permission',

        'device',
        'visitor',
        'silabus',
        'statistik',
        'countdata',

        'users',
        'roles',
        'permissions',

        'menus',
        'submenus',

        'statuses',

        'paths',
        'roadmaps',
        'playlists',
        'posts',

        'comments'
      ],

      'superadmin' => [
        'profile',
        'edit profile',
        'change password',

        'menu',
        'submenu',
        'permission',

        'device',
        'visitor',
        'silabus',
        'statistik',
        'countdata',

        'users',
        'roles',
        'permissions',

        'menus',
        'submenus',

        'statuses',

        'paths',
        'roadmaps',
        'playlists',
        'posts',

        'comments'
      ],

      'admin' => [
        'profile',
        'edit profile',
        'change password',

        'paths',
        'roadmaps',
        'playlists',
        'posts',
      ],

      'concreat' => [
        'profile',
        'edit profile',
        'change password',

        'paths',
        'roadmaps',
        'playlists',
        'posts',
      ],

      'member' => [
        'profile',
        'edit profile',
        'change password',
      ],
    ];

    foreach ($rolHasSubmenus as $roleName => $submenuNames) {
      if (isset($roles[$roleName])) {
        $roles[$roleName]->submenus()->attach(
          collect($submenuNames)->mapWithKeys(
            fn($name) => [$submenus[$name]->id => []]
          )
        );
      }
    }
  }
}
