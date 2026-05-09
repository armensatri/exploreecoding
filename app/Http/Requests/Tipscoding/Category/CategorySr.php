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
      'name.required' => 'Category..name! harus di isi',
      'name.min' => 'Category..name! minimal 3 karakter',
      'name.max' => 'Category..name! maksimal 75 karakter',

      'slug.required' => 'Category..slug! harus di isi',
      'slug.min' => 'Category..slug! minimal 3 karakter',
      'slug.max' => 'Category..slug! maksimal 75 karakter',

      'sc.required' => 'Category..sorting! harus di isi',
      'sc.numeric' => 'Category..sorting! hanya boleh angka',

      'image.image' => 'Category..image! file yang di upload bukan image',
      'image.max' => 'Category..image! ukuran image maksimal 2 mb',
      'image.mimes' => 'Category..image! type image hanya boleh png, jpg,jpeg dan webp',
    ];
  }
}
