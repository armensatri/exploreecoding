<?php

namespace App\Enums;

enum PermissionIcon
{
  public static function get(string $controller)
  {
    $icons = [
      'dashboard' => 'dashboard.jpg',

      'profile' => 'profile.jpg',
      'personal' => 'personal.png',
      'changepassword' => 'changepassword.jpg',

      'sosmeds' => 'sosmeds.png',

      'data' => 'data.png',
      'visitor' => 'visitor.jpg',
      'access' => 'access.png',
      'statistic' => 'statistic.jpg',
      'monitoring' => 'monitoring.png',

      'users' => 'users.jpg',
      'roles' => 'roles.jpg',
      'permissions' => 'permissions.jpg',

      'menus' => 'menus.jpg',
      'submenus' => 'submenus.jpg',

      'statuses' => 'statuses.jpg',

      'paths' => 'paths.png',
      'roadmaps' => 'roadmaps.png',
      'playlists' => 'playlists.png',
      'posts' => 'posts.png',

      'tipscodings' => 'tipscodings.png',
      'tipsreports' => 'report.png',
      'categories' => 'categories.png',
    ];

    $controller_name = strtolower($controller);
    $fileName = $icons[$controller_name] ?? 'default.png';

    return "/backend/img/menu/{$fileName}";
  }
}
