<?php

namespace App\Helpers;

class RandomUrl
{
  public static function GenerateUrl($length = 4)
  {
    $characters = 'abcdefghijklmnopqrstuvwxyz';

    $url = '';

    for ($i = 0; $i < $length; $i++) {
      $url .= $characters[rand(0, strlen($characters) - 1)];
    }

    return 'url' . strtolower($url);
  }
}
