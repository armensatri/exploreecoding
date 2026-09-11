<?php

namespace App\Http\Requests\Account\Sosmed;

use Illuminate\Foundation\Http\FormRequest;

class SosmedUr extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'github' => [
        'nullable',
        'max:100'
      ],

      'linkedin' => [
        'nullable',
        'max:100'
      ],

      'threads' => [
        'nullable',
        'max:100'
      ],

      'instagram' => [
        'nullable',
        'max:100'
      ],

      'x' => [
        'nullable',
        'max:100'
      ],

      'facebook' => [
        'nullable',
        'max:100'
      ],

      'tiktok' => [
        'nullable',
        'max:100'
      ],
    ];
  }

  public function messages()
  {
    return [
      '*.max' => 'Data sosmed maksimal 100 karakter.',
    ];
  }
}
