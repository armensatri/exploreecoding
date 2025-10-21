<?php

namespace Database\Seeders\Managemenu;

use App\Models\Managemenu\Navigation;
use Illuminate\Database\Seeder;

class NavigationSeeder extends Seeder
{
  public function run(): void
  {
    $navigations = [
      [
        'sn' => 1,
        'name' => 'Home',
        'slug' => 'home',
        'routee' => '/',
        'button_name' => 'home',
        'description' => "Welcome back exploreecoding belajar pemograman terstruktur dan gratis"
      ],
    ];

    foreach ($navigations as $navigation) {
      Navigation::create($navigation);
    }
  }
}
