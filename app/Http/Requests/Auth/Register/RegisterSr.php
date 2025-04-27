<?php

namespace App\Http\Requests\Auth\Register;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class RegisterSr extends FormRequest
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
        'min:6',
        'max:25',
        'regex:/^[a-zA-Z\s]+$/'
      ],

      'username' => [
        'required',
        'min:6',
        'max:12',
        'regex:/^[a-z]+$/',
        'unique:users,username'
      ],

      'email' => [
        'required',
        'email:rfc,dns',
        'unique:users,email'
      ],

      'password' => [
        'required',
        'min:6',
        'max:64',
        'regex:/^[a-zA-Z0-9]+$/',
        'same:passkon'
      ],

      'passkon' => [
        'required',
        'same:password'
      ],
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'Nama! harus di isi',
      'name.min' => 'Nama! minimal 6 karakter',
      'name.max' => 'Nama! maksimal 25 karakter',
      'name.regex' => 'Nama! hanya boleh huruf kecil dan besar',

      'username.required' => 'Username! harus di isi',
      'username.min' => 'Username! minimal 6 karakter',
      'username.max' => 'Username! maksimal 12 karakter',
      'username.regex' => 'Username! harus huruf kecil dan tanpa spasi',
      'username.unique' => 'Username! sudah terdaptar',

      'email.required' => 'Email! harus di isi',
      'email.email' => 'Email! tidak valid',
      'email.unique' => 'Email! sudah terdaptar',

      'password.required' => 'Password! harus di isi',
      'password.min' => 'Password! minimal 6 karakter',
      'password.max' => 'Password! maksimal 64 karakter',
      'password.regex' => 'Password! harus huruf dan angka, tanpa spasi',
      'password.same' => 'Password! harus sama dengan password konfirm',

      'passkon.required' => 'Password konfirm! harus di isi',
      'passkon.same' => 'Password konfirm! harus sama dengan password',
    ];
  }
}
