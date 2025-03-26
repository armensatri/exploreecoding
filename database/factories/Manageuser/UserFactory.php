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
      'role_id' => 4,
      'is_active' => mt_rand(0, 1)
    ];
  }
}
