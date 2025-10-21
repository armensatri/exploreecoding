<?php

namespace Database\Seeders\Manageuser;

use App\Models\Manageuser\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  public function run(): void
  {
    $users = [
      [
        'name' => 'Armen Satri',
        'username' => 'armensatri',
        'email' => 'armensatri@gmail.com',
        'password' => bcrypt('Coba123#'),
        'role_id' => 1,
      ],

      [
        'name' => 'Super Admin',
        'username' => 'superadmin',
        'email' => 'superadmin@gmail.com',
        'password' => bcrypt('Coba123#'),
        'role_id' => 2,
      ],

      [
        'name' => 'Admin',
        'username' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('Coba123#'),
        'role_id' => 3,
      ],

      [
        'name' => 'Writing',
        'username' => 'writing',
        'email' => 'writing@gmail.com',
        'password' => bcrypt('Coba123#'),
        'role_id' => 4,
      ],

      [
        'name' => 'Editor',
        'username' => 'editor',
        'email' => 'editor@gmail.com',
        'password' => bcrypt('Coba123#'),
        'role_id' => 5,
      ],

      [
        'name' => 'Member',
        'username' => 'member',
        'email' => 'member@gmail.com',
        'password' => bcrypt('Coba123#'),
        'role_id' => 6,
      ],
    ];

    foreach ($users as $user) {
      User::create($user);
    }
  }
}
