<?php

namespace App\Enums;

class MenuIcon
{
  public static function get(String $name)
  {
    $icons = [
      // OWNER
      'owner' => 'dashboard.jpg',

      // SUPERADMIN
      'superadmin' => 'dashboard.jpg',

      // ADMIN
      'admin' => 'dashboard.jpg',

      // WRITING
      'writing' => 'dashboard.jpg',

      // EDITOR
      'editor' => 'dashboard.jpg',

      // MEMBER
      'member' => 'dashboard.jpg',

      // ACCOUNT
      'profile' => 'profile.jpg',
      'personal' => 'personal.png',
      'changepassword' => 'changepassword.jpg',

      // MANAGEDATA
      'data' => 'data.png',
      'visitor' => 'visitor.jpg',
      'access' => 'access.png',
      'statistic' => 'statistic.jpg',

      // MANAGEUSER
      'users' => 'users.jpg',
      'roles' => 'roles.jpg',
      'permissions' => 'permissions.jpg',

      // MANAGEMENU
      'menus' => 'menus.jpg',
      'submenus' => 'submenus.jpg',
      'explores' => 'explores.png',
      'navigations' => 'navigations.png',

      // PUBLISHED
      'statuses' => 'statuses.jpg',
    ];

    $fileName = $icons[strtolower($name)] ?? '';

    return "/backend/img/menu/{$fileName}";
  }
}
