<?php

namespace App\Http\Requests\Programming\Roadmap;

use Illuminate\Foundation\Http\FormRequest;

class RoadmapUr extends FormRequest
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

      'path_id' => [
        'required'
      ],

      'sr' => [
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
      'status_id.required' => 'Roadmap..status! harus di isi',

      'path_id.required' => 'Roadmap..path! harus di isi',

      'sr.required' => 'Roadmap..sorting! harus di isi',
      'sr.numeric' => 'Roadmap..sorting! hanya boleh angka',

      'name.required' => 'Roadmap..name! harus di isi',
      'name.min' => 'Roadmap..name! minimal 3 karakter',
      'name.max' => 'Roadmap..name! maksimal 75 karakter',

      'slug.required' => 'Roadmap..slug! harus di isi',
      'slug.min' => 'Roadmap..slug! minimal 3 karakter',
      'slug.max' => 'Roadmap..slug! maksimal 75 karakter',

      'description.required' => 'Roadmap..description! harus di isi',

      'image.image' => 'Roadmap..image! file yang di upload bukan image',
      'image.max' => 'Roadmap..image! ukuran image maksimal 2 mb',
      'image.mimes' => 'Roadmap..image! type image hanya boleh png, jpg, jpeg, dan webp',
    ];
  }
}
