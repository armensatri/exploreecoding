<?php

namespace Database\Seeders\Pivot;

use App\Models\Managemenu\Menu;
use Illuminate\Database\Seeder;
use App\Models\Manageuser\Role;

class RoleHasMenuSeeder extends Seeder
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

    $menus = Menu::whereIn('name', [
      'owner',
      'superadmin',
      'admin',
      'concreat',
      'member',
      'account',
      'manageaccess',
      'managedata',
      'manageuser',
      'managemenu',
      'publish',
      'programming',
      'comments'
    ])->get()->keyBy('name');

    $roleHasMenus = [
      'owner' => [
        'owner',
        'account',
        'manageaccess',
        'managedata',
        'manageuser',
        'managemenu',
        'publish',
        'programming',
        'comments'
      ],

      'superadmin' => [
        'superadmin',
        'account',
        'manageaccess',
        'managedata',
        'manageuser',
        'managemenu',
        'publish',
        'programming',
        'comments'
      ],

      'admin' => [
        'admin',
        'account',
        'programming',
      ],

      'concreat' => [
        'concreat',
        'account',
        'programming',
      ],

      'member' => [
        'member',
        'account',
      ],
    ];

    foreach ($roleHasMenus as $roleName => $menuNames) {
      if (isset($roles[$roleName])) {
        $roles[$roleName]->menus()->attach(
          collect($menuNames)->mapWithKeys(
            fn($menu) => [
              $menus[$menu]->id => []
            ]
          )
        );
      }
    }
  }
}
