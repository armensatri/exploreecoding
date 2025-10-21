<?php

namespace App\Enums;

class ExploreIcon
{
  public static function get(string $name): ?string
  {
    $icons = [
      'app laravel' => 'app-laravel.png',
    ];

    $key = strtolower(trim($name));
    $fileName = $icons[$key] ?? null;

    return $fileName ? "frontend/img/explore/{$fileName}" : null;
  }
}
