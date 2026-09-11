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
        'user_id' => 2,
        'linkedin' => 'superadmin',
        'github' => 'superadmin',
        'threads' => 'superadmin',
        'instagram' => 'superadmin',
        'x' => 'superadmin',
        'facebook' => 'superadmin',
        'tiktok' => 'superadmin',
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
        'linkedin' => 'member',
        'github' => 'member',
        'threads' => 'member',
        'instagram' => 'member',
        'x' => 'member',
        'facebook' => 'member',
        'tiktok' => 'member',
      ],
    ];

    foreach ($sosmeds as $sosmed) {
      Sosmed::create($sosmed);
    }
  }
}
