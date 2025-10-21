<?php

namespace App\Helpers;

class RandomUrl
{
  public static function generateUrl($length = 7)
  {
    $characters = 'abcdefghijklmnopqrstuvwxyz';

    $url = '';

    for ($i = 0; $i < $length; $i++) {
      $url .= $characters[random_int(0, strlen($characters) - 1)];
    }

    return 'x' . strtolower($url);
  }
}
