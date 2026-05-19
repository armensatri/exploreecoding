<?php

namespace App\Http\Requests\Account\ChangePassword;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\{
  Auth,
  Hash
};

class ChangePasswordUr extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'username' => [
        'required',
        'min:3',
        'max:14',
        'regex:/^[a-z]+$/',
      ],

      'current' => [
        'required',
        function ($attribute, $value, $fail) {
          if (!Hash::check($value, Auth::user()->password)) {
            $fail('Password..lama! salah.');
          }
        },
      ],

      'password' => [
        'required',
        'min:8',
        'max:64',
        'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/',
        'same:confirmation'
      ],

      'confirmation' => [
        'required',
        'same:password'
      ],
    ];
  }

  public function messages()
  {
    return [
      'username.required' => 'User..username! harus di isi',
      'username.min' => 'User..username! minimal 3 karakter',
      'username.max' => 'User..username! maksimal 14 karakter',
      'username.regex' => 'User..username! hanya boleh huruf kecil saja dan tanpa spasi',

      'current.required' => 'Password..lama! harus di isi',

      'password.required' => 'Password..baru! harus di isi',
      'password.min' => 'Password..baru! minimal 8 karakter',
      'password.max' => 'Password..baru! maksimal 64 karakter',
      'password.regex' => 'Password..baru! harus ada huruf besar, huruf kecil, angka, dan karakter khusus. ex : EXample123@###hahaha - tidak boleh ada spasi',
      'password.same' => 'Password..baru! harus sama dengan password confirmation',

      'confirmation.required' => 'Password..confirmation! harus di isi',
      'confirmation.same' => 'Password..confirmation! harus sama dengan password baru',
    ];
  }
}
