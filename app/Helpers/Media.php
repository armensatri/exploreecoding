<?php

namespace App\Helpers;

class Media
{
  public static function Sosmed(): array
  {
    return [
      'github' => [
        'url' => 'https://github.com/',
        'image' => 'github.png',
      ],

      'linkedin' => [
        'url' => 'https://www.linkedin.com/in/',
        'image' => 'linkedin.png',
      ],

      'threads' => [
        'url' => 'https://www.threads.com/@',
        'image' => 'threads.png',
      ],

      'instagram' => [
        'url' => 'https://www.instagram.com/',
        'image' => 'instagram.png',
      ],

      'x' => [
        'url' => 'https://x.com/',
        'image' => 'x.png',
      ],

      'facebook' => [
        'url' => 'https://www.facebook.com/',
        'image' => 'facebook.png',
      ],

      'tiktok' => [
        'url' => 'https://www.tiktok.com/@',
        'image' => 'tiktok.png',
      ],
    ];
  }
}
