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
        'description' => 'masih draft'
      ],

      [
        'ss' => 2,
        'name' => 'up comming',
        'bg' => 'bg-red-200',
        'text' => 'text-red-800',
        'description' => 'yang akan datang | belum bisa di akses'
      ],

      [
        'ss' => 3,
        'name' => 'on progress',
        'bg' => 'bg-yellow-200',
        'text' => 'text-yellow-800',
        'description' => 'tahap pengembangan | belum bisa di akses'
      ],

      [
        'ss' => 4,
        'name' => 'done',
        'bg' => 'bg-green-200',
        'text' => 'text-green-800',
        'description' => 'pengembangan selesai | belum bisa di akses'
      ],

      [
        'ss' => 5,
        'name' => 'explore',
        'bg' => 'bg-blue-200',
        'text' => 'text-blue-800',
        'description' => 'explore | belajar sekarang juga'
      ],
    ];

    foreach ($statuses as $statuse) {
      Status::create($statuse);
    }
  }
}
