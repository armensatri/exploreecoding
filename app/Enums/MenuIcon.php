<?php

namespace App\Enums;

class MenuIcon
{
  public static function get(String $name)
  {
    $icons = [
      // HOME
      'dashboard' => 'dashboard.jpg',

      // ACCOUNT
      'profile' => 'profile.jpg',
      'personal' => 'personal.png',
      'changepassword' => 'changepassword.jpg',

      // MANAGEDATA
      'data' => 'data.png',
      'visitor' => 'visitor.jpg',
      'access' => 'access.png',
      'statistic' => 'statistic.jpg',
      'view' => 'view.png',

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

      // PROGRAMMING
      'paths' => 'paths.png',
      'roadmaps' => 'roadmaps.png',
      'playlists' => 'playlists.png',
      'posts' => 'posts.png',

      // TIPSCODING
      'tipscodings' => 'tipscodings.png',
      'categories' => 'categories.png',
    ];

    $fileName = $icons[strtolower($name)] ?? '';

    return "/backend/img/menu/{$fileName}";
  }
}
