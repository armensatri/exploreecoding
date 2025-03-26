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

      'description' => [
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
      'path_id.required' => 'Roadmap..path! harus di isi',

      'sr.required' => 'Roadmap..sorting! harus di isi',
      'sr.numeric' => 'Roadmap..sorting! harus angka',

      'name.required' => 'Roadmap..name! harus di isi',
      'name.min' => 'Roadmap..name! minimal 3 karakter',
      'name.max' => 'Roadmap..name! maksimal 75 karakter',

      'slug.required' => 'Roadmap..slug! harus di isi',
      'slug.min' => 'Roadmap..slug! minimal 3 karakter',
      'slug.max' => 'Roadmap..slug! maksimal 75 karakter',

      'status_id.required' => 'Roadmap..status! harus di isi',

      'description.required' => 'Roadmap..description! harus di isi',

      'image.image' => 'Roadmap..image! yang di upload bukan image',
      'image.max' => 'Roadmap..image! ukuran maksimal 2 mb',
    ];
  }
}
