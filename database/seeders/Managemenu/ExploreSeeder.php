<?php

namespace Database\Seeders\Managemenu;

use Illuminate\Database\Seeder;
use App\Models\Managemenu\Explore;

class ExploreSeeder extends Seeder
{
  public function run(): void
  {
    $explores = [
      [
        'se' => 1,
        'name' => 'App Laravel',
        'slug' => 'app-laravel',
        'routee' => 'https://laravel.com',
        'button_name' => 'Laravel',
        'description' => 'Laravel php framework dengan syntax elegan dan powerfull'
      ],
    ];

    foreach ($explores as $explore) {
      Explore::create($explore);
    }
  }
}
