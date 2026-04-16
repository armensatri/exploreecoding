<?php

namespace App\Helpers;

class RandomUrl
{
  public static function generateUrl($length = 7)
  {
    $charackters = 'abcdefghijklmnopqrstuvwxyz';

    $url = '';

    for ($i = 0; $i < $length; $i++) {
      $url .= $charackters[random_int(0, strlen($charackters) - 1)];
    }

    return 'x' . strtolower($url) . 'x';
  }
}
