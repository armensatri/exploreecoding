<?php

namespace App\Http\Requests\Tipscoding\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategorySr extends FormRequest
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
        'max:75'
      ],

      'slug' => [
        'required',
        'min:3',
        'max:75'
      ],

      'sc' => [
        'required',
        'numeric'
      ],
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'Category..name! harus di isi',
      'name.min' => 'Category..name! minimal 3 karakter',
      'name.max' => 'Category..name! maksimal 75 karakter',

      'slug.required' => 'Category..slug! harus di isi',
      'slug.min' => 'Category..slug! minimal 3 karakter',
      'slug.max' => 'Category..slug! maksimal 75 karakter',

      'sc.required' => 'Category..sorting! harus di isi',
      'sc.numeric' => 'Category..sorting! hanya boleh angka',
    ];
  }
}
