<?php

namespace App\Http\Requests\Manageuser\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUr extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'name' => [
        'required',
        'min:5',
        'max:25',
        'regex:/^[a-zA-Z\s]+$/'
      ],

      'username' => [
        'required',
        'min:6',
        'max:14',
        'regex:/^[a-z]+$/',
      ],

      'email' => [
        'required',
        'email:rfc,dns',
      ],

      'image' => [
        'image',
        'max:2048',
        'mimes:jpeg,png,jpg,webp'
      ],

      'role_id' => [
        'required',
      ],
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'User..name! harus di isi',
      'name.min' => 'User..name! minimal 6 karakter',
      'name.max' => 'User..name! maksimal 25 karakter',
      'name.regex' => 'User..name! hanya boleh huruf kecil dan besar',

      'username.required' => 'User..username! harus di isi',
      'username.min' => 'User..username! minimal 6 karakter',
      'username.max' => 'User..username! maksimal 14 karakter',
      'username.regex' =>
      'User..username! harus huruf kecil dan tanpa spasi',

      'email.required' => 'User..email! harus di isi',
      'email.email' => 'User..email! tidak valid',

      'image.image' => 'User..image! file yang di upload bukan image',
      'image.max' => 'User..image! ukuran image maksimal 2 mb',
      'image.mimes' => 'User..image! harus jpg, png, dan jpeg',

      'role_id.required' => 'User..role! harus di isi',
    ];
  }
}
