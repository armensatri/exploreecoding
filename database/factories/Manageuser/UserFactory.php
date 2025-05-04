<?php

namespace Database\Factories\Manageuser;

use App\Models\Manageuser\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
  protected $model = User::class;

  public function definition(): array
  {
    return [
      'name' => $this->faker->firstName() . ' ' . $this->faker->lastName(),
      'username' => strtolower($this->faker->unique()->word()),
      'email' => strtolower(
        $this->faker->unique()->userName()
      ) . '@gmail.com',
      'password' => Hash::make('123qwe'),
      'role_id' => mt_rand(2, 5),
    ];
  }
}
