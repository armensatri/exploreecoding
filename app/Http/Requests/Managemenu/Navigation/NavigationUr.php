<?php

namespace App\Http\Requests\Managemenu\Navigation;

use Illuminate\Foundation\Http\FormRequest;

class NavigationUr extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'sn' => [
        'required',
        'numeric'
      ],

      'name' => [
        'required',
        'min:3',
        'max:75',
      ],

      'slug' => [
        'required',
        'min:3',
        'max:75',
      ],

      'routee' => [
        'nullable'
      ],

      'button_name' => [
        'required'
      ],

      'description' => [
        'required'
      ],
    ];
  }

  public function messages()
  {
    return [
      'sn.required' => 'Navigation..sorting! harus di isi',
      'sn.numeric' => 'Navigation..sorting! hanya boleh angka',

      'name.required' => 'Navigation..name! harus di isi',
      'name.min' => 'Navigation..name! minimal 3 karakter',
      'name.max' => 'Navigation..name! maksimal 75 karakter',

      'slug.required' => 'Navigation..slug! harus di isi',
      'slug.min' => 'Navigation..slug! minimal 3 karakter',
      'slug.max' => 'Navigation..slug! maksimal 75 karakter',

      'button_name.required' => 'Navigation..button! harus di isi',

      'description.required' => 'Navigation..description! harus di isi',
    ];
  }
}
