<?php

namespace App\Http\Requests\Account\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUr extends FormRequest
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
        'unique:users,username,' . Auth::id(),
      ],

      'image' => [
        'nullable',
        'image',
        'max:2048',
        'mimes:png,jpg,jpeg,webp'
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

      'image.image' => 'User..image! file yang di upload bukan image',
      'image.max' => 'User..image! ukuran image maksimal 2 mb',
      'image.mimes' => 'User..image! type image hanya boleh png, jpg, jpeg, dan webp',
    ];
  }
}
