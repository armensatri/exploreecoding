<?php

namespace App\Http\Requests\Managemenu\Explore;

use Illuminate\Foundation\Http\FormRequest;

class ExploreUr extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'se' => [
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
      'se.required' => 'Explore..sorting! harus di isi',
      'se.numeric' => 'Explore..sorting! hanya boleh angka',

      'name.required' => 'Explore..name! harus di isi',
      'name.min' => 'Explore..name! minimal 3 karakter',
      'name.max' => 'Explore..name! maksimal 75 karakter',

      'slug.required' => 'Explore..slug! harus di isi',
      'slug.min' => 'Explore..slug! minimal 3 karakter',
      'slug.max' => 'Explore..slug! maksimal 75 karakter',

      'button_name.required' => 'Explore..button name! harus di isi',

      'description.required' => 'Explore..description! harus di isi',
    ];
  }
}
