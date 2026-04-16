<?php

namespace Database\Seeders\Published;

use App\Helpers\RandomUrl;
use Illuminate\Database\Seeder;
use App\Models\Published\Status;

class StatusSeeder extends Seeder
{
  public function run(): void
  {
    $statuses = [
      [
        'ss' => 1,
        'name' => 'upcoming',
        'slug' => 'upcoming',
        'bg' => 'bg-red-200',
        'text' => 'text-red-800',
        'description' => 'yang akan datang | no access',
        'url' => RandomUrl::generateUrl()
      ],
      [
        'ss' => 2,
        'name' => 'on progress',
        'slug' => 'on progress',
        'bg' => 'bg-yellow-200',
        'text' => 'text-yellow-800',
        'description' => 'tahan pengembangan | no access',
        'url' => RandomUrl::generateUrl()
      ],
      [
        'ss' => 3,
        'name' => 'explore',
        'slug' => 'explore',
        'bg' => 'bg-blue-200',
        'text' => 'text-blue-800',
        'description' => 'explore',
        'url' => RandomUrl::generateUrl()
      ],
    ];

    foreach ($statuses as $status) {
      Status::create($status);
    }
  }
}
