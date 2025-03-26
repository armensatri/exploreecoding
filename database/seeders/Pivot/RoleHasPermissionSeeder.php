<?php

namespace Database\Seeders\Pivot;

use App\Models\Manageuser\Role;
use Illuminate\Database\Seeder;
use App\Models\Manageuser\Permission;

class RoleHasPermissionSeeder extends Seeder
{
  public function run(): void
  {
    $roles = [
      'owner',
      'superadmin',
      'admin',
      'member'
    ];

    foreach ($roles as $rolename) {
      Role::firstOrCreate(
        ['name' => $rolename],
        ['guard_name' => 'web']
      );
    }

    $rolehaspermissions = [
      'owner' => [
        'a.menu',
        'ca.menu',
        'a.submenu',
        'ca.submenu',
        'a.permission',
        'ca.permission',

        'profile',
        'profile.edit',
        'profile.update',

        'menu',
        'submenu',
        'permission',

        'menus.index',
        'menus.create',
        'menus.store',
        'menus.show',
        'menus.edit',
        'menus.update',
        'menus.destroy',

        'submenus.index',
        'submenus.create',
        'submenus.store',
        'submenus.show',
        'submenus.edit',
        'submenus.update',
        'submenus.destroy',

        'users.index',
        'users.create',
        'users.store',
        'users.show',
        'users.edit',
        'users.update',
        'users.destroy',

        'roles.index',
        'roles.create',
        'roles.store',
        'roles.show',
        'roles.edit',
        'roles.update',
        'roles.destroy',

        'permissions.index',
        'permissions.create',
        'permissions.store',
        'permissions.show',
        'permissions.edit',
        'permissions.update',
        'permissions.destroy',
      ],

      'superadmin' => [
        'a.menu',
        'ca.menu',
        'a.submenu',
        'ca.submenu',
        'a.permission',
        'ca.permission',

        'profile',
        'profile.edit',
        'profile.update',

        'menu',
        'submenu',
        'permission',

        'menus.index',
        'menus.create',
        'menus.store',
        'menus.show',
        'menus.edit',
        'menus.update',
        'menus.destroy',

        'submenus.index',
        'submenus.create',
        'submenus.store',
        'submenus.show',
        'submenus.edit',
        'submenus.update',
        'submenus.destroy',

        'users.index',
        'users.create',
        'users.store',
        'users.show',
        'users.edit',
        'users.update',
        'users.destroy',

        'roles.index',
        'roles.create',
        'roles.store',
        'roles.show',
        'roles.edit',
        'roles.update',
        'roles.destroy',

        'permissions.index',
        'permissions.create',
        'permissions.store',
        'permissions.show',
        'permissions.edit',
        'permissions.update',
        'permissions.destroy',
      ],

      'admin' => [
        'profile',
        'profile.edit',
        'profile.update',
      ],

      'member' => [
        'profile',
        'profile.edit',
        'profile.update',
      ],
    ];

    foreach ($rolehaspermissions as $rolename => $permissions) {
      $role = Role::where('name', $rolename)->first();

      if (!$role) {
        continue;
      }

      foreach ($permissions as $permissionname) {
        Permission::firstOrCreate(
          ['name' => $permissionname],
          ['guard_name' => 'web']
        );
      }

      $permissionIds = Permission::whereIn('name', $permissions)
        ->pluck('id');

      $role->permissions()->sync($permissionIds);
    }
  }
}
