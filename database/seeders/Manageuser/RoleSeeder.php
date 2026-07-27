<?php

namespace Database\Seeders\Manageuser;

use App\Models\Manageuser\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
  public function run(): void
  {
    $roles = [
      [
        'sr' => 1,
        'name' => 'owner',
        'slug' => 'owner',
        'bg' => 'bg-red-200',
        'text' => 'text-red-800',
        'description' => 'pemilik penuh kendali system',
      ],

      [
        'sr' => 2,
        'name' => 'superadmin',
        'slug' => 'superadmin',
        'bg' => 'bg-yellow-200',
        'text' => 'text-yellow-800',
        'description' => 'pengelola tertinggi semua akses',
      ],

      [
        'sr' => 3,
        'name' => 'creator',
        'slug' => 'creator',
        'bg' => 'bg-green-200',
        'text' => 'text-green-800',
        'description' => 'penulis content',
      ],

      [
        'sr' => 4,
        'name' => 'member',
        'slug' => 'member',
        'bg' => 'bg-slate-200',
        'text' => 'text-slate-800',
        'description' => 'user visitor biasa',
      ],
    ];

    foreach ($roles as $role) {
      Role::create($role);
    }
  }
}
