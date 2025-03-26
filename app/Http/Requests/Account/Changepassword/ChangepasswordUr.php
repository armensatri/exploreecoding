<?php

namespace App\Http\Requests\Account\Changepassword;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class ChangepasswordUr extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'password_lama' => [
        'required',
        function ($attribute, $value, $fail) {
          if (!Hash::check($value, Auth::user()->password)) {
            $fail('Password lama tidak valid.');
          }
        },
      ],

      'password_baru' => [
        'required',
        'min:6',
        'max:256',
        'regex:/^[a-zA-Z0-9]+$/',
        'same:password_konfirmasi'
      ],

      'password_konfirmasi' => [
        'required',
        'same:password_baru'
      ]
    ];
  }

  public function messages(): array
  {
    return [
      'password_lama.required' => 'Password..lama! harus di isi',

      'password_baru.required' => 'Password..baru! harus di isi',
      'password_baru.min' => 'Password..baru! minimal 6 karakter',
      'password_baru.max' => 'Password..baru! maksimal 256 karakter',
      'password_baru.regex' => 'Password..baru! harus huruf dan angka tanpa spasi',
      'password_baru.same' => 'Password..baru! harus sama denga password konfirmasi',

      'password_konfirmasi.required' => 'Password..konfirmasi! harus di isi',
      'password_konfirmasi.same' => 'Password..konfirmasi! harus sam dengan password baru',
    ];
  }
}
