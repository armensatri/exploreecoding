<?php

namespace App\Http\Requests\Manageuser\User;

use Illuminate\Foundation\Http\FormRequest;

class UserSr extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'name' => [],

      'username' => [],

      'email' => [],

      'password' => [],

      'image' => [],

      'role_id' => [],
    ];
  }

  public function messages()
  {
    return [
      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',
      'name.' => 'User..name!',
    ];
  }
}
