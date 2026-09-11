<?php

namespace Database\Seeders\Account;

use App\Models\Account\Sosmed;
use Illuminate\Database\Seeder;

class SosmedSeeder extends Seeder
{
  public function run(): void
  {
    $sosmeds = [
      [
        'user_id' => 1,
        'linkedin' => 'armensatri',
        'github' => 'armensatri',
        'threads' => 'armensatri',
        'instagram' => 'armensatri',
        'x' => 'armensatri',
        'facebook' => 'armensatri',
        'tiktok' => 'armensatri',
      ],

      [
        'user_id' => 3,
        'linkedin' => 'creator',
        'github' => 'creator',
        'threads' => 'creator',
        'instagram' => 'creator',
        'x' => 'creator',
        'facebook' => 'creator',
        'tiktok' => 'creator',
      ],

      [
        'user_id' => 4,
        'linkedin' => 'arman',
        'github' => 'arman',
        'threads' => 'arman',
        'instagram' => 'arman',
        'x' => 'arman',
        'facebook' => 'arman',
        'tiktok' => 'arman',
      ],

      [
        'user_id' => 5,
        'linkedin' => 'satri',
        'github' => 'satri',
        'threads' => 'satri',
        'instagram' => 'satri',
        'x' => 'satri',
        'facebook' => 'satri',
        'tiktok' => 'satri',
      ],
    ];

    foreach ($sosmeds as $sosmed) {
      Sosmed::create($sosmed);
    }
  }
}
