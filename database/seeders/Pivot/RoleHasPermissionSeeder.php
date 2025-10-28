<?php

namespace Database\Seeders\Pivot;

use Illuminate\Database\Seeder;
use App\Models\Manageuser\Role;
use App\Models\Manageuser\Permission;

class RoleHasPermissionSeeder extends Seeder
{
  public function run(): void
  {
    $roles = [
      'owner',
      'superadmin',
      'admin',
      'writing',
      'editor',
      'member'
    ];

    foreach ($roles as $rolename) {
      Role::firstOrCreate(
        ['name' => $rolename],
        ['guard_name' => 'web']
      );
    }

    $roleHasPermissions = [
      'owner' => [
        // DASHBOARD
        'owner',
        // 'superadmin',
        // 'admin',
        // 'writing',
        // 'editor',
        // 'member',

        // PROFILE
        'profile',
        'profile.edit',
        'profile.update',

        // PERSONAL PUBLIC
        'personal',

        // CHANGE PASSWORD
        'changepassword',
        'changepassword.edit',
        'changepassword.update',

        // DATA
        'data',

        // VISITOR
        'visitor',
        'visitor.banned',

        // ACCESS
        'access',
        'access.menu',
        'access.up.menu',
        'access.submenu',
        'access.up.submenu',
        'access.permission',
        'access.up.permission',

        // STATISTIC
        'statistic',

        // SILABUS
        'silabus',

        // USERS
        'users.index',
        'users.create',
        'users.store',
        'users.show',
        'users.edit',
        'users.update',
        'users.destroy',
        'users.change.status',

        // ROLES
        'roles.index',
        'roles.create',
        'roles.store',
        'roles.show',
        'roles.edit',
        'roles.update',
        'roles.destroy',

        // PERMISSIONS
        'permissions.index',
        'permissions.create',
        'permissions.store',
        'permissions.show',
        'permissions.edit',
        'permissions.update',
        'permissions.destroy',

        // MENUS
        'menus.index',
        'menus.create',
        'menus.store',
        'menus.show',
        'menus.edit',
        'menus.update',
        'menus.destroy',

        // SUBMENUS
        'submenus.index',
        'submenus.create',
        'submenus.store',
        'submenus.show',
        'submenus.edit',
        'submenus.update',
        'submenus.destroy',

        // EXPLORES
        'explores.index',
        'explores.create',
        'explores.store',
        'explores.show',
        'explores.edit',
        'explores.update',
        'explores.destroy',

        // NAVIGATIONS
        'navigations.index',
        'navigations.create',
        'navigations.store',
        'navigations.show',
        'navigations.edit',
        'navigations.update',
        'navigations.destroy',

        // STATUSES
        'statuses.index',
        'statuses.create',
        'statuses.store',
        'statuses.show',
        'statuses.edit',
        'statuses.update',
        'statuses.destroy',

        // PATHS
        'paths.index',
        'paths.create',
        'paths.store',
        'paths.show',
        'paths.edit',
        'paths.update',
        'paths.destroy',

        // ROADMAPS
        'roadmaps.index',
        'roadmaps.create',
        'roadmaps.store',
        'roadmaps.show',
        'roadmaps.edit',
        'roadmaps.update',
        'roadmaps.destroy',

        // PLAYLISTS
        'playlists.index',
        'playlists.create',
        'playlists.store',
        'playlists.show',
        'playlists.edit',
        'playlists.update',
        'playlists.destroy',

        // PPOST
        'posts.index',
        'posts.create',
        'posts.store',
        'posts.show',
        'posts.edit',
        'posts.update',
        'posts.destroy',
      ],

      'superadmin' => [
        // DASHBOARD
        // 'owner',
        'superadmin',
        // 'admin',
        // 'writing',
        // 'editor',
        // 'member',

        // PROFILE
        'profile',
        'profile.edit',
        'profile.update',

        // PERSONAL PUBLIC
        'personal',

        // CHANGE PASSWORD
        'changepassword',
        'changepassword.edit',
        'changepassword.update',

        // DATA
        'data',

        // VISITOR
        'visitor',
        'visitor.banned',

        // ACCESS
        'access',
        'access.menu',
        'access.up.menu',
        'access.submenu',
        'access.up.submenu',
        'access.permission',
        'access.up.permission',

        // STATISTIC
        'statistic',

        // SILABUS
        'silabus',

        // USERS
        'users.index',
        'users.create',
        'users.store',
        'users.show',
        'users.edit',
        'users.update',
        'users.destroy',
        'users.change.status',

        // ROLES
        'roles.index',
        'roles.create',
        'roles.store',
        'roles.show',
        'roles.edit',
        'roles.update',
        'roles.destroy',

        // PERMISSIONS
        'permissions.index',
        'permissions.create',
        'permissions.store',
        'permissions.show',
        'permissions.edit',
        'permissions.update',
        'permissions.destroy',

        // MENUS
        'menus.index',
        'menus.create',
        'menus.store',
        'menus.show',
        'menus.edit',
        'menus.update',
        'menus.destroy',

        // SUBMENUS
        'submenus.index',
        'submenus.create',
        'submenus.store',
        'submenus.show',
        'submenus.edit',
        'submenus.update',
        'submenus.destroy',

        // EXPLORES
        'explores.index',
        'explores.create',
        'explores.store',
        'explores.show',
        'explores.edit',
        'explores.update',
        'explores.destroy',

        // NAVIGATIONS
        'navigations.index',
        'navigations.create',
        'navigations.store',
        'navigations.show',
        'navigations.edit',
        'navigations.update',
        'navigations.destroy',

        // STATUSES
        'statuses.index',
        'statuses.create',
        'statuses.store',
        'statuses.show',
        'statuses.edit',
        'statuses.update',
        'statuses.destroy',
      ],

      'admin' => [
        // DASHBOARD
        // 'owner',
        // 'superadmin',
        'admin',
        // 'writing',
        // 'editor,
        // 'member',

        // PROFILE
        'profile',
        'profile.edit',
        'profile.update',

        // PERSONAL PUBLIC
        'personal',

        // CHANGE PASSWORD
        'changepassword',
        'changepassword.edit',
        'changepassword.update',

        // DATA
        // 'data',

        // VISITOR
        // 'visitor',
        // 'visitor.banned',

        // ACCESS
        // 'access',
        // 'access.menu',
        // 'access.up.menu',
        // 'access.submenu',
        // 'access.up.submenu',
        // 'access.permission',
        // 'access.up.permission',

        // STATISTIC
        // 'statistic',

        // SILABUS
        'silabus',

        // USERS
        // 'users.index',
        // 'users.create',
        // 'users.store',
        // 'users.show',
        // 'users.edit',
        // 'users.update',
        // 'users.destroy',
        // 'users.change.status',

        // ROLES
        // 'roles.index',
        // 'roles.create',
        // 'roles.store',
        // 'roles.show',
        // 'roles.edit',
        // 'roles.update',
        // 'roles.destroy',

        // PERMISSIONS
        // 'permissions.index',
        // 'permissions.create',
        // 'permissions.store',
        // 'permissions.show',
        // 'permissions.edit',
        // 'permissions.update',
        // 'permissions.destroy',

        // MENUS
        // 'menus.index',
        // 'menus.create',
        // 'menus.store',
        // 'menus.show',
        // 'menus.edit',
        // 'menus.update',
        // 'menus.destroy',

        // SUBMENUS
        // 'submenus.index',
        // 'submenus.create',
        // 'submenus.store',
        // 'submenus.show',
        // 'submenus.edit',
        // 'submenus.update',
        // 'submenus.destroy',

        // EXPLORES
        // 'explores.index',
        // 'explores.create',
        // 'explores.store',
        // 'explores.show',
        // 'explores.edit',
        // 'explores.update',
        // 'explores.destroy',

        // NAVIGATIONS
        // 'navigations.index',
        // 'navigations.create',
        // 'navigations.store',
        // 'navigations.show',
        // 'navigations.edit',
        // 'navigations.update',
        // 'navigations.destroy',

        // STATUSES
        // 'statuses.index',
        // 'statuses.create',
        // 'statuses.store',
        // 'statuses.show',
        // 'statuses.edit',
        // 'statuses.update',
        // 'statuses.destroy',
      ],

      'writing' => [
        // DASHBOARD
        // 'owner',
        // 'superadmin',
        // 'admin',
        'writing',
        // 'editor,
        // 'member',

        // PROFILE
        'profile',
        'profile.edit',
        'profile.update',

        // PERSONAL PUBLIC
        'personal',

        // CHANGE PASSWORD
        'changepassword',
        'changepassword.edit',
        'changepassword.update',

        // DATA
        // 'data',

        // VISITOR
        // 'visitor',
        // 'visitor.banned',

        // ACCESS
        // 'access',
        // 'access.menu',
        // 'access.up.menu',
        // 'access.submenu',
        // 'access.up.submenu',
        // 'access.permission',
        // 'access.up.permission',

        // STATISTIC
        // 'statistic',

        // SILABUS
        // 'silabus',

        // USERS
        // 'users.index',
        // 'users.create',
        // 'users.store',
        // 'users.show',
        // 'users.edit',
        // 'users.update',
        // 'users.destroy',
        // 'users.change.status',

        // ROLES
        // 'roles.index',
        // 'roles.create',
        // 'roles.store',
        // 'roles.show',
        // 'roles.edit',
        // 'roles.update',
        // 'roles.destroy',

        // PERMISSIONS
        // 'permissions.index',
        // 'permissions.create',
        // 'permissions.store',
        // 'permissions.show',
        // 'permissions.edit',
        // 'permissions.update',
        // 'permissions.destroy',

        // MENUS
        // 'menus.index',
        // 'menus.create',
        // 'menus.store',
        // 'menus.show',
        // 'menus.edit',
        // 'menus.update',
        // 'menus.destroy',

        // SUBMENUS
        // 'submenus.index',
        // 'submenus.create',
        // 'submenus.store',
        // 'submenus.show',
        // 'submenus.edit',
        // 'submenus.update',
        // 'submenus.destroy',

        // EXPLORES
        // 'explores.index',
        // 'explores.create',
        // 'explores.store',
        // 'explores.show',
        // 'explores.edit',
        // 'explores.update',
        // 'explores.destroy',

        // NAVIGATIONS
        // 'navigations.index',
        // 'navigations.create',
        // 'navigations.store',
        // 'navigations.show',
        // 'navigations.edit',
        // 'navigations.update',
        // 'navigations.destroy',

        // STATUSES
        // 'statuses.index',
        // 'statuses.create',
        // 'statuses.store',
        // 'statuses.show',
        // 'statuses.edit',
        // 'statuses.update',
        // 'statuses.destroy',
      ],

      'editor' => [
        // DASHBOARD
        // 'owner',
        // 'superadmin',
        // 'admin',
        // 'writing',
        'editor',
        // 'member',

        // PROFILE
        'profile',
        'profile.edit',
        'profile.update',

        // PERSONAL PUBLIC
        'personal',

        // CHANGE PASSWORD
        'changepassword',
        'changepassword.edit',
        'changepassword.update',

        // DATA
        // 'data',

        // VISITOR
        // 'visitor',
        // 'visitor.banned',

        // ACCESS
        // 'access',
        // 'access.menu',
        // 'access.up.menu',
        // 'access.submenu',
        // 'access.up.submenu',
        // 'access.permission',
        // 'access.up.permission',

        // STATISTIC
        // 'statistic',

        // SILABUS
        // 'silabus',

        // USERS
        // 'users.index',
        // 'users.create',
        // 'users.store',
        // 'users.show',
        // 'users.edit',
        // 'users.update',
        // 'users.destroy',
        // 'users.change.status',

        // ROLES
        // 'roles.index',
        // 'roles.create',
        // 'roles.store',
        // 'roles.show',
        // 'roles.edit',
        // 'roles.update',
        // 'roles.destroy',

        // PERMISSIONS
        // 'permissions.index',
        // 'permissions.create',
        // 'permissions.store',
        // 'permissions.show',
        // 'permissions.edit',
        // 'permissions.update',
        // 'permissions.destroy',

        // MENUS
        // 'menus.index',
        // 'menus.create',
        // 'menus.store',
        // 'menus.show',
        // 'menus.edit',
        // 'menus.update',
        // 'menus.destroy',

        // SUBMENUS
        // 'submenus.index',
        // 'submenus.create',
        // 'submenus.store',
        // 'submenus.show',
        // 'submenus.edit',
        // 'submenus.update',
        // 'submenus.destroy',

        // EXPLORES
        // 'explores.index',
        // 'explores.create',
        // 'explores.store',
        // 'explores.show',
        // 'explores.edit',
        // 'explores.update',
        // 'explores.destroy',

        // NAVIGATIONS
        // 'navigations.index',
        // 'navigations.create',
        // 'navigations.store',
        // 'navigations.show',
        // 'navigations.edit',
        // 'navigations.update',
        // 'navigations.destroy',

        // STATUSES
        // 'statuses.index',
        // 'statuses.create',
        // 'statuses.store',
        // 'statuses.show',
        // 'statuses.edit',
        // 'statuses.update',
        // 'statuses.destroy',
      ],

      'member' => [
        // DASHBOARD
        // 'owner',
        // 'superadmin',
        // 'admin',
        // 'writing',
        // 'editor,
        'member',

        // PROFILE
        'profile',
        'profile.edit',
        'profile.update',

        // PERSONAL PUBLIC
        'personal',

        // CHANGE PASSWORD
        'changepassword',
        'changepassword.edit',
        'changepassword.update',

        // DATA
        // 'data',

        // VISITOR
        // 'visitor',
        // 'visitor.banned',

        // ACCESS
        // 'access',
        // 'access.menu',
        // 'access.up.menu',
        // 'access.submenu',
        // 'access.up.submenu',
        // 'access.permission',
        // 'access.up.permission',

        // STATISTIC
        // 'statistic',

        // SILABUS
        // 'silabus',

        // USERS
        // 'users.index',
        // 'users.create',
        // 'users.store',
        // 'users.show',
        // 'users.edit',
        // 'users.update',
        // 'users.destroy',
        // 'users.change.status',

        // ROLES
        // 'roles.index',
        // 'roles.create',
        // 'roles.store',
        // 'roles.show',
        // 'roles.edit',
        // 'roles.update',
        // 'roles.destroy',

        // PERMISSIONS
        // 'permissions.index',
        // 'permissions.create',
        // 'permissions.store',
        // 'permissions.show',
        // 'permissions.edit',
        // 'permissions.update',
        // 'permissions.destroy',

        // MENUS
        // 'menus.index',
        // 'menus.create',
        // 'menus.store',
        // 'menus.show',
        // 'menus.edit',
        // 'menus.update',
        // 'menus.destroy',

        // SUBMENUS
        // 'submenus.index',
        // 'submenus.create',
        // 'submenus.store',
        // 'submenus.show',
        // 'submenus.edit',
        // 'submenus.update',
        // 'submenus.destroy',

        // EXPLORES
        // 'explores.index',
        // 'explores.create',
        // 'explores.store',
        // 'explores.show',
        // 'explores.edit',
        // 'explores.update',
        // 'explores.destroy',

        // NAVIGATIONS
        // 'navigations.index',
        // 'navigations.create',
        // 'navigations.store',
        // 'navigations.show',
        // 'navigations.edit',
        // 'navigations.update',
        // 'navigations.destroy',

        // STATUSES
        // 'statuses.index',
        // 'statuses.create',
        // 'statuses.store',
        // 'statuses.show',
        // 'statuses.edit',
        // 'statuses.update',
        // 'statuses.destroy',
      ],
    ];

    foreach ($roleHasPermissions as $roleName => $permissions) {
      $role = Role::where('name', $roleName)->first();

      if (!$role) {
        continue;
      }

      foreach ($permissions as $permissionName) {
        Permission::firstOrCreate(
          ['name' => $permissionName],
          ['guard_name' => 'web']
        );
      }

      $permissionIds = Permission::whereIn('name', $permissions)
        ->pluck('id');

      $role->permissions()->sync($permissionIds);
    }
  }
}
