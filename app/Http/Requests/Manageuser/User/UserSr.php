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
        'unique:users,username'
      ],

      'email' => [
        'required',
        'email:rfc.dns',
        'unique:users,email'
      ],

      'password' => [
        'required',
        'min:8',
        'max:64',
        'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/',
        'same:passkon'
      ],

      'passkon' => [
        'required',
        'same:password'
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
      'username.unique' => 'User..username! sudah terdaptar',

      'email.required' => 'User..email! harus di isi',
      'email.email' => 'User..email! tidak valid',
      'email.unique' => 'User..email! sudah terdaptar',

      'password.required' => 'User..password! harus di isi',
      'password.min' => 'User..password! minimal 8 karakter',
      'password.max' => 'User..password! maksimal 64 karakter',
      'password.regex' => 'User..password! harus ada huruf besar, huruf kecil, angka, dan karakter khusus. ex : EXample123@###hahaha - tidak boleh ada spasi',
      'password.same' => 'User..password! harus sama dengan password konfirm',

      'passkon.required' => 'User..password konfirm! harus di isi',
      'passkon.same' => 'User..password konfirm! harus sama dengan password',

      'image.image' => 'User..image! file yang di upload bukan image',
      'image.max' => 'User..image! ukuran image maksimal 2 mb',
      'image.mimes' => 'User..image! type image hanya boleh png, jpg, jpeg, dan webp',

      'role_id.required' => 'User..role! harus di isi',
    ];
  }
}
