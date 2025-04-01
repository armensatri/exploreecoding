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
      'concreat',
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
        'change.password.edit',
        'change.password.update',

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

        'statuses.index',
        'statuses.create',
        'statuses.store',
        'statuses.show',
        'statuses.edit',
        'statuses.update',
        'statuses.destroy',

        'paths.index',
        'paths.create',
        'paths.store',
        'paths.show',
        'paths.edit',
        'paths.update',
        'paths.destroy',
        'paths.draft',

        'roadmaps.index',
        'roadmaps.create',
        'roadmaps.store',
        'roadmaps.show',
        'roadmaps.edit',
        'roadmaps.update',
        'roadmaps.destroy',
        'roadmaps.draft',

        'playlists.index',
        'playlists.create',
        'playlists.store',
        'playlists.show',
        'playlists.edit',
        'playlists.update',
        'playlists.destroy',
        'playlists.draft',

        'posts.index',
        'posts.create',
        'posts.store',
        'posts.show',
        'posts.edit',
        'posts.update',
        'posts.destroy',
        'posts.draft',
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
        'change.password.edit',
        'change.password.update',

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

        'statuses.index',
        'statuses.create',
        'statuses.store',
        'statuses.show',
        'statuses.edit',
        'statuses.update',
        'statuses.destroy',

        'paths.index',
        'paths.create',
        'paths.store',
        'paths.show',
        'paths.edit',
        'paths.update',
        'paths.destroy',
        'paths.draft',

        'roadmaps.index',
        'roadmaps.create',
        'roadmaps.store',
        'roadmaps.show',
        'roadmaps.edit',
        'roadmaps.update',
        'roadmaps.destroy',
        'roadmaps.draft',

        'playlists.index',
        'playlists.create',
        'playlists.store',
        'playlists.show',
        'playlists.edit',
        'playlists.update',
        'playlists.destroy',
        'playlists.draft',

        'posts.index',
        'posts.create',
        'posts.store',
        'posts.show',
        'posts.edit',
        'posts.update',
        'posts.destroy',
        'posts.draft',
      ],

      'admin' => [
        'profile',
        'profile.edit',
        'profile.update',
        'change.password.edit',
        'change.password.update',

        'paths.index',
        'paths.create',
        'paths.store',
        'paths.show',
        'paths.edit',
        'paths.update',
        'paths.destroy',
        'paths.draft',

        'roadmaps.index',
        'roadmaps.create',
        'roadmaps.store',
        'roadmaps.show',
        'roadmaps.edit',
        'roadmaps.update',
        'roadmaps.destroy',
        'roadmaps.draft',

        'playlists.index',
        'playlists.create',
        'playlists.store',
        'playlists.show',
        'playlists.edit',
        'playlists.update',
        'playlists.destroy',
        'playlists.draft',

        'posts.index',
        'posts.create',
        'posts.store',
        'posts.show',
        'posts.edit',
        'posts.update',
        'posts.destroy',
        'posts.draft',
      ],

      'concreat' => [
        'profile',
        'profile.edit',
        'profile.update',
        'change.password.edit',
        'change.password.update',

        'posts.index',
        'posts.create',
        'posts.store',
        'posts.show',
        'posts.draft',
      ],

      'member' => [
        'profile',
        'profile.edit',
        'profile.update',
        'change.password.edit',
        'change.password.update',
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
