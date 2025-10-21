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
        'min:3',
        'max:25',
        'regex:/^[a-zA-Z\s]+$/'
      ],

      'username' => [
        'required',
        'min:3',
        'max:14',
        'regex:/^[a-z]+$/',
      ],

      'email' => [
        'required',
        'email:rfc.dns',
      ],

      'image' => [
        'nullable',
        'image',
        'max:2048',
        'mimes:png,jpg,jpeg,webp'
      ],

      'role_id' => [
        'required'
      ],
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'User..name! harus di isi',
      'name.min' => 'User..name! minimal 3 karakter',
      'name.max' => 'User..name! maksimal 25 karakter',
      'name.regex' => 'User..name! hanya boleh huruf kecil atau besar saja',

      'username.required' => 'User..username! harus di isi',
      'username.min' => 'User..username! minimal 3 karakter',
      'username.max' => 'User..username! maksimal 14 karakter',
      'username.regex' => 'User..username! hanya boleh huruf kecil saja dan tanpa spasi',

      'email.required' => 'User..email! harus di isi',
      'email.email' => 'User..email! tidak valid',

      'image.image' => 'User..image! file yang di upload bukan image',
      'image.max' => 'User..image! ukuran image maksimal 2 mb',
      'image.mimes' => 'User..image! type image hanya boleh png, jpg, jpeg, dan webp',

      'role_id.required' => 'User..role! harus di isi',
    ];
  }
}
