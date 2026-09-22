<?php

namespace App\Enums;

enum PermissionIcon
{
  public static function get(string $controller)
  {
    $icons = [
      'dashboard' => 'dashboard.jpg',
      'profile' => 'profile.jpg',
      'personal' => 'personal.png'
    ];

    $controller_name = strtolower($controller);
    $fileName = $icons[$controller_name] ?? 'default.png';

    return "/backend/img/menu/{$fileName}";
  }
}
