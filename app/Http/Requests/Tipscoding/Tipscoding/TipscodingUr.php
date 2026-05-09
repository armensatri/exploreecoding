<?php

namespace App\Http\Requests\Tipscoding\Tipscoding;

use Illuminate\Foundation\Http\FormRequest;

class TipscodingUr extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'category_id' => [
        'required'
      ],

      'title' => [
        'required',
        'min:3',
        'max:128'
      ],

      'slug' => [
        'required',
        'min:3',
        'max:128'
      ],

      'excerpt' => [
        'required'
      ],

      'content' => [
        'required'
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
      'category_id.required' => 'Tipscoding..category! harus di isi',

      'title.required' => 'Tipscoding..title! harus di isi',
      'title.min' => 'Tipscoding..title! minimal 3 karakter',
      'title.max' => 'Tipscoding..title! maksimal 128 karakter',

      'slug.required' => 'Tipscoding..slug! harus di isi',
      'slug.min' => 'Tipscoding..slug! minimal 3 karakter',
      'slug.max' => 'Tipscoding..slug! maksimal 128 karakter',

      'excerpt.required' => 'Tipscoding..excerpt! harus di isi',

      'content.required' => 'Tipscoding..content! harus di isi',

      'image.image' => 'Tipscoding..image! file yang di upload bukan image',
      'image.max' => 'Tipscoding..image! ukuran image maksimal 2 mb',
      'image.mimes' => 'Tipscoding..image! type image hanya boleh png, jpg,jpeg dan webp',
    ];
  }
}
