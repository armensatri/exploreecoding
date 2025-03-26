<?php

namespace Database\Seeders\Manageuser;

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
        'description' => 'owner system'
      ],

      [
        'sr' => 2,
        'name' => 'superadmin',
        'slug' => 'superadmin',
        'bg' => 'bg-yellow-200',
        'text' => 'text-yellow-800',
        'description' => 'boss system'
      ],

      [
        'sr' => 3,
        'name' => 'admin',
        'slug' => 'admin',
        'bg' => 'bg-green-200',
        'text' => 'text-green-800',
        'description' => 'administrasi system'
      ],

      [
        'sr' => 4,
        'name' => 'member',
        'slug' => 'member',
        'bg' => 'bg-slate-200',
        'text' => 'text-slate-800',
        'description' => 'user biasa'
      ],
    ];

    foreach ($roles as $role) {
      Role::create($role);
    }
  }
}
