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
      'creator',
      'member'
    ])->get()->keyBy('name');

    $menus = Menu::whereIn('name', [
      'owner',
      'superadmin',
      'creator',
      'member',
      'account',
      'managedata',
      'manageuser',
      'managemenu',
      'published',
      'programming',
      'tipscoding',
    ])->get()->keyBy('name');

    $roleHasMenus = [
      'owner' => [
        'owner',
        // 'superadmin',
        // 'creator',
        // 'member',
        'account',
        'managedata',
        'manageuser',
        'managemenu',
        'published',
        'programming',
        'tipscoding',
      ],

      'superadmin' => [
        // 'owner',
        'superadmin',
        // 'creator',
        // 'member',
        'account',
        'managedata',
        'manageuser',
        'managemenu',
        'published',
        'programming',
        'tipscoding',
      ],

      'creator' => [
        // 'owner',
        // 'superadmin',
        'creator',
        // 'member',
        'account',
        // 'managedata',
        // 'manageuser',
        // 'managemenu',
        // 'published',
        'programming',
        'tipscoding',
      ],

      'member' => [
        // 'owner',
        // 'superadmin',
        // 'creator',
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
