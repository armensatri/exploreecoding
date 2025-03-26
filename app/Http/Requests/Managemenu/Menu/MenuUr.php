<?php

namespace App\Http\Requests\Managemenu\Menu;

use Illuminate\Foundation\Http\FormRequest;

class MenuUr extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'sm' => [
        'required',
        'numeric'
      ],

      'name' => [
        'required',
        'min:3',
        'max:50',
      ],

      'description' => [
        'required'
      ],
    ];
  }

  public function messages()
  {
    return [
      'sm.required' => 'Menu..sorting! harus di isi',
      'sm.numeric' => 'Menu..sorting! harus angka',

      'name.required' => 'Menu..name! harus di isi',
      'name.min' => 'Menu..name! minimal 3 karakter',
      'name.max' => 'Menu..name! maksimal 50 karakter',

      'description.required' => 'Menu..description! harus di isi',
    ];
  }
}
