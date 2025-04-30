<?php

namespace App\Enums;

class MenuIcon
{
  public static function get(string $name): string
  {
    $icons = [
      'owner' => 'dashboard.jpg',
      'superadmin' => 'dashboard.jpg',
      'admin' => 'dashboard.jpg',
      'concreat' => 'dashboard.jpg',
      'member' => 'dashboard.jpg',

      'profile' => 'profile.jpg',
      'profile public' => 'pp.png',
      'profile edit' => 'ep.png',
      'change password' => 'change-password.jpg',

      'data' => 'data.png',
      'access' => 'access.png',
      'device' => 'device.png',
      'visitor' => 'visitor.jpg',
      'content' => 'silabus.jpg',
      'statistic' => 'statistik.jpg',

      'users' => 'users.jpg',
      'roles' => 'roles.jpg',
      'permissions' => 'permissions.jpg',

      'menus' => 'menu.jpg',
      'submenus' => 'submenu.jpg',

      'statuses' => 'statuses.jpg',

      'paths' => 'paths.jpg',
      'roadmaps' => 'roadmaps.jpg',
      'playlists' => 'playlists.jpg',
      'posts' => 'posts.jpg',

      'comments' => 'comentar.jpg',
    ];

    $filename = $icons[strtolower($name)] ?? '';
    return "/backend/img/menu/{$filename}";
  }
}
