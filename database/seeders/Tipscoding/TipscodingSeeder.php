<?php

namespace Database\Seeders\Tipscoding;

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
        'title' => 'Apa itu html',
        'slug' => 'apa-itu-html',
        'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur, et praesentium ea quasi quaerat quae molestiae.',
      ],
      [
        'user_id' => 2,
        'category_id' => 1,
        'title' => 'Sejarah html',
        'slug' => 'sejarah-html',
        'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur, et praesentium ea quasi quaerat quae molestiae.',
      ],

      [
        'user_id' => 3,
        'category_id' => 2,
        'title' => 'Apa itu css',
        'slug' => 'apa-itu-css',
        'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur, et praesentium ea quasi quaerat quae molestiae.',
      ],
      [
        'user_id' => 4,
        'category_id' => 2,
        'title' => 'Sejarah css',
        'slug' => 'sejarah-css',
        'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur, et praesentium ea quasi quaerat quae molestiae.',
      ],

      [
        'user_id' => 1,
        'category_id' => 3,
        'title' => 'Apa itu javascript',
        'slug' => 'apa-itu-javascript',
        'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolores! Animi blanditiis tenetur, et praesentium ea quasi quaerat quae molestiae.',
      ],
    ];

    foreach ($tipscodings as $tipscoding) {
      Tipscoding::create($tipscoding);
    }
  }
}
