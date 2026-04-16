<?php

namespace Database\Seeders\Tipscoding;

use App\Helpers\RandomUrl;
use Illuminate\Database\Seeder;
use App\Models\Tipscoding\Tipscoding;

class TipscodingSeeder extends Seeder
{
  public function run(): void
  {
    $tipscodings = [
      [
        'user_id' => 1,
        'category_id' => 1,
        'title' => 'apa itu html',
        'slug' => 'apa-itu-html',
        'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur, et praesentium ea quasi quaerat quae molestiae.',
        'url' => RandomUrl::generateUrl()
      ],
      [
        'user_id' => 2,
        'category_id' => 1,
        'title' => 'sejarah html',
        'slug' => 'sejarah-html',
        'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur, et praesentium ea quasi quaerat quae molestiae.',
        'url' => RandomUrl::generateUrl()
      ],

      [
        'user_id' => 3,
        'category_id' => 2,
        'title' => 'apa itu css',
        'slug' => 'apa-itu-css',
        'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur, et praesentium ea quasi quaerat quae molestiae.',
        'url' => RandomUrl::generateUrl()
      ],
      [
        'user_id' => 4,
        'category_id' => 2,
        'title' => 'sejarah css',
        'slug' => 'sejarah-css',
        'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur, et praesentium ea quasi quaerat quae molestiae.',
        'url' => RandomUrl::generateUrl()
      ],

      [
        'user_id' => 1,
        'category_id' => 3,
        'title' => 'apa itu javascript',
        'slug' => 'apa-itu-javascript',
        'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur, et praesentium ea quasi quaerat quae molestiae.',
        'url' => RandomUrl::generateUrl()
      ],
      [
        'user_id' => 2,
        'category_id' => 3,
        'title' => 'sejarah javascript',
        'slug' => 'sejarah-javascript',
        'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur, et praesentium ea quasi quaerat quae molestiae.',
        'url' => RandomUrl::generateUrl()
      ],
      [
        'user_id' => 3,
        'category_id' => 3,
        'title' => 'dasar javascript',
        'slug' => 'dasar-javascript',
        'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur, et praesentium ea quasi quaerat quae molestiae.',
        'url' => RandomUrl::generateUrl()
      ],
    ];

    foreach ($tipscodings as $tipscoding) {
      Tipscoding::create($tipscoding);
    }
  }
}
