<?php

namespace Database\Seeders\Manageuser;

use App\Helpers\RandomUrl;
use Illuminate\Database\Seeder;
use App\Models\Manageuser\User;

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
        'url' => RandomUrl::generateUrl()
      ],

      [
        'name' => 'Super Admin',
        'username' => 'superadmin',
        'email' => 'superadmin@gmail.com',
        'password' => bcrypt('Coba123#'),
        'role_id' => 2,
        'url' => RandomUrl::generateUrl()
      ],

      [
        'name' => 'Creator',
        'username' => 'creator',
        'email' => 'creator@gmail.com',
        'password' => bcrypt('Coba123#'),
        'role_id' => 3,
        'url' => RandomUrl::generateUrl()
      ],

      [
        'name' => 'Member',
        'username' => 'member',
        'email' => 'member@gmail.com',
        'password' => bcrypt('Coba123#'),
        'role_id' => 4,
        'url' => RandomUrl::generateUrl()
      ],
    ];

    foreach ($users as $user) {
      User::create($user);
    }
  }
}
