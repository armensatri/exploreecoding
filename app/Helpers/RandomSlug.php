<?php

namespace App\Helpers;

class RandomSlug
{
  public static function generate($length = 5)
  {
    $characters = 'abcdefghijklmnopqrstuvwxyz';

    $slug = '';

    for ($i = 0; $i < $length; $i++) {
      $slug .= $characters[random_int(0, strlen($characters) - 1)];
    }

    return 'x' . strtolower($slug) . 'x';
  }
}
