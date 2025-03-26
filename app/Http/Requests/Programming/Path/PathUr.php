<?php

namespace App\Http\Requests\Programming\Path;

use Illuminate\Foundation\Http\FormRequest;

class PathUr extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'sp' => [
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

      'status_id' => [
        'required'
      ],

      'image' => [
        'image',
        'max:2048'
      ],
    ];
  }

  public function messages()
  {
    return [
      'sp.required' => 'Path..sorting! harus di isi',
      'sp.numeric' => 'Path..sorting! harus angka',

      'name.required' => 'Path..name! harus di isi',
      'name.min' => 'Path..name! minimal 3 karakter',
      'name.max' => 'Path..name! maksimal 75 karakter',

      'slug.required' => 'Path..slug! harus di isi',
      'slug.min' => 'Path..slug! minimal 3 karakter',
      'slug.max' => 'Path..slug! maksimal 75 karakter',

      'status_id.required' => 'Path..status! harus di isi',

      'image.image' => 'Path..image! file yang di upload bukan image',
      'image.max' => 'Path..image! ukuran image maksimal 2 mb',
    ];
  }
}
