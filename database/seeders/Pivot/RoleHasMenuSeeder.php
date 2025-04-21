<?php

namespace Database\Seeders\Pivot;

use Illuminate\Database\Seeder;
use App\Models\Managemenu\Menu;
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
      'managedata',
      'manageuser',
      'managemenu',
      'published',
      'programming',
      'comment'
    ])->get()->keyBy('name');

    $roleHasMenus = [
      'owner' => [
        'owner',
        // 'superadmin',
        // 'admin',
        // 'concreat',
        // 'member',
        'account',
        'managedata',
        'manageuser',
        'managemenu',
        'published',
        'programming',
        'comment'
      ],

      'superadmin' => [
        // 'owner',
        'superadmin',
        // 'admin',
        // 'concreat',
        // 'member',
        'account',
        'managedata',
        'manageuser',
        'managemenu',
        'published',
        'programming',
        'comment'
      ],

      'admin' => [
        // 'owner',
        // 'superadmin',
        'admin',
        // 'concreat',
        // 'member',
        'account',
        // 'managedata',
        // 'manageuser',
        // 'managemenu',
        // 'published',
        'programming',
        // 'comment'
      ],

      'concreat' => [
        // 'owner',
        // 'superadmin',
        // 'admin',
        'concreat',
        // 'member',
        'account',
        // 'managedata',
        // 'manageuser',
        // 'managemenu',
        // 'published',
        'programming',
        // 'comment'
      ],

      'member' => [
        // 'owner',
        // 'superadmin',
        // 'admin',
        // 'concreat',
        'member',
        'account',
        // 'managedata',
        // 'manageuser',
        // 'managemenu',
        // 'published',
        // 'programming',
        // 'comment'
      ],
    ];

    foreach ($roleHasMenus as $roleName => $menuNames) {
      if (isset($roles[$roleName])) {
        $menuIds = collect($menuNames)
          ->filter(fn($menuName) => isset($menus[$menuName]))
          ->map(fn($menuName) => $menus[$menuName]->id)
          ->toArray();

        $roles[$roleName]->menus()->attach($menuIds);
      }
    }
  }
}
