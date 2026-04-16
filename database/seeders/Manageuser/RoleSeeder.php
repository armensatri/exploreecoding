<?php

namespace Database\Seeders\Manageuser;

use App\Helpers\RandomUrl;
use Illuminate\Database\Seeder;
use App\Models\Manageuser\Role;

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
        'url' => RandomUrl::generateUrl()
      ],

      [
        'sr' => 2,
        'name' => 'superadmin',
        'slug' => 'superadmin',
        'bg' => 'bg-yellow-200',
        'text' => 'text-yellow-800',
        'description' => 'pengelola tertinggi semua akses',
        'url' => RandomUrl::generateUrl()
      ],

      [
        'sr' => 3,
        'name' => 'creator',
        'slug' => 'creator',
        'bg' => 'bg-green-200',
        'text' => 'text-green-800',
        'description' => 'penulis content',
        'url' => RandomUrl::generateUrl()
      ],

      [
        'sr' => 4,
        'name' => 'member',
        'slug' => 'member',
        'bg' => 'bg-slate-200',
        'text' => 'text-slate-800',
        'description' => 'user visitor biasa',
        'url' => RandomUrl::generateUrl()
      ],
    ];

    foreach ($roles as $role) {
      Role::create($role);
    }
  }
}
