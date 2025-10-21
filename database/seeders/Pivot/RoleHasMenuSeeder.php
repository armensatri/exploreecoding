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
      'writing',
      'editor',
      'member'
    ])->get()->keyBy('name');

    $menus = Menu::whereIn('name', [
      'owner',
      'superadmin',
      'admin',
      'writing',
      'editor',
      'member',
      'account',
      'managedata',
      'manageuser',
      'managemenu',
      'published',
      'programming',
    ])->get()->keyBy('name');

    $roleHasMenus = [
      'owner' => [
        'owner',
        // 'superadmin',
        // 'admin',
        // 'writing',
        // 'editor',
        // 'member',
        'account',
        'managedata',
        'manageuser',
        'managemenu',
        'published',
        'programming',
      ],

      'superadmin' => [
        // 'owner',
        'superadmin',
        // 'admin',
        // 'writing',
        // 'editor',
        // 'member',
        'account',
        'managedata',
        'manageuser',
        'managemenu',
        'published',
        'programming',
      ],

      'admin' => [
        // 'owner',
        // 'superadmin',
        'admin',
        // 'writing',
        // 'editor',
        // 'member',
        'account',
        // 'managedata',
        // 'manageuser',
        // 'managemenu',
        // 'published',
        'programming',
      ],

      'writing' => [
        // 'owner',
        // 'superadmin',
        // 'admin',
        'writing',
        // 'editor',
        // 'member',
        'account',
        // 'managedata',
        // 'manageuser',
        // 'managemenu',
        // 'published',
        'programming',
      ],

      'editor' => [
        // 'owner',
        // 'superadmin',
        // 'admin',
        // 'writing',
        'editor',
        // 'member',
        'account',
        // 'managedata',
        // 'manageuser',
        // 'managemenu',
        // 'published',
        'programming',
      ],

      'member' => [
        // 'owner',
        // 'superadmin',
        // 'admin',
        // 'writing',
        // 'editor',
        'member',
        'account',
        // 'managedata',
        // 'manageuser',
        // 'managemenu',
        // 'published',
        // 'programming',
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
