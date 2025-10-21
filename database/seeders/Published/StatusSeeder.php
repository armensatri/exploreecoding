<?php

namespace Database\Seeders\Published;

use Illuminate\Database\Seeder;
use App\Models\Published\Status;

class StatusSeeder extends Seeder
{
  public function run(): void
  {
    $statuses = [
      [
        'ss' => 1,
        'name' => 'draft',
        'slug' => 'draft',
        'bg' => 'bg-slate-200',
        'text' => 'text-slate-800',
        'description' => 'masih di dalam draft'
      ],
      [
        'ss' => 2,
        'name' => 'upcoming',
        'slug' => 'upcoming',
        'bg' => 'bg-red-200',
        'text' => 'text-red-800',
        'description' => 'yang akan datang | no access'
      ],
      [
        'ss' => 3,
        'name' => 'on progress',
        'slug' => 'on progress',
        'bg' => 'bg-yellow-200',
        'text' => 'text-yellow-800',
        'description' => 'tahan pengembangan | no access'
      ],
      [
        'ss' => 4,
        'name' => 'done',
        'slug' => 'done',
        'bg' => 'bg-green-200',
        'text' => 'text-green-800',
        'description' => 'pengembangan selesai | no access'
      ],
      [
        'ss' => 5,
        'name' => 'explore',
        'slug' => 'explore',
        'bg' => 'bg-blue-200',
        'text' => 'text-blue-800',
        'description' => 'explore'
      ],
      [
        'ss' => 6,
        'name' => 'active',
        'slug' => 'active',
        'bg' => 'bg-green-200',
        'text' => 'text-green-800',
        'description' => 'status active'
      ],
      [
        'ss' => 7,
        'name' => 'valid',
        'slug' => 'valid',
        'bg' => 'bg-blue-200',
        'text' => 'text-blue-800',
        'description' => 'status valid'
      ],
      [
        'ss' => 8,
        'name' => 'invalid',
        'slug' => 'invalid',
        'bg' => 'bg-red-200',
        'text' => 'text-red-800',
        'description' => 'status valid'
      ],
    ];

    foreach ($statuses as $status) {
      Status::create($status);
    }
  }
}
