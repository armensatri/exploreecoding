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
      'sp' => [
        'required',
        'numeric'
      ],

      'name' => [
        'required',
        'min:3',
        'max:75',
        'unique:paths,name'
      ],

      'slug' => [
        'required',
        'min:3',
        'max:75',
        'unique:paths,slug'
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
      'name.unique' => 'Path..name! sudah terdaptar',

      'slug.required' => 'Path..slug! harus di isi',
      'slug.min' => 'Path..slug! minimal 3 karakter',
      'slug.max' => 'Path..slug! maksimal 75 karakter',
      'slug.unique' => 'Path..slug! sudah terdaptar',

      'status_id.required' => 'Path..status! harus di isi',

      'image.image' => 'Path..image! file yang di upload bukan image',
      'image.max' => 'Path..image! ukuran image maksimal 2 mb',
    ];
  }
}
