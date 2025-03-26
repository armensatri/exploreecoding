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
        'bg' => 'bg-slate-200',
        'text' => 'text-slate-800',
        'description' => 'no publish'
      ],

      [
        'ss' => 2,
        'name' => 'upcoming',
        'bg' => 'bg-red-200',
        'text' => 'text-red-800',
        'description' => 'yang akan datang'
      ],

      [
        'ss' => 3,
        'name' => 'on progress',
        'bg' => 'bg-yellow-200',
        'text' => 'text-yellow-800',
        'description' => 'tahap pengembangan'
      ],

      [
        'ss' => 4,
        'name' => 'done',
        'bg' => 'bg-green-200',
        'text' => 'text-green-800',
        'description' => 'pengembangan selesai'
      ],

      [
        'ss' => 5,
        'name' => 'new',
        'bg' => 'bg-blue-200',
        'text' => 'text-blue-800',
        'description' => 'explore now'
      ],
    ];

    foreach ($statuses as $status) {
      Status::create($status);
    }
  }
}
