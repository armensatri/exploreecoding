<?php

namespace App\Http\Requests\Programming\Path;

use Illuminate\Foundation\Http\FormRequest;

class PathSr extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'status_id' => [
        'required'
      ],

      'sp' => [
        'required',
        'numeric'
      ],

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

      'description' => [
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
      'status_id.required' => 'Path..status! harus di isi',

      'sp.required' => 'Path..sorting! harus di isi',
      'sp.numeric' => 'Path..sorting! hanya boleh angka',

      'name.required' => 'Path..name! harus di isi',
      'name.min' => 'Path..name! minimal 3 karakter',
      'name.max' => 'Path..name! maksimal 75 karakter',

      'slug.required' => 'Path..slug! harus di isi',
      'slug.min' => 'Path..slug! minimal 3 karakter',
      'slug.max' => 'Path..slug! maksimal 75 karakter',

      'description.required' => 'Path..description! harus di isi',

      'image.image' => 'Path..image! file yang di upload bukan image',
      'image.max' => 'Path..image! ukuran image maksimal 2 mb',
      'image.mimes' => 'Path..image! type image hanya boleh png, jpg, jpeg, webp',
    ];
  }
}
