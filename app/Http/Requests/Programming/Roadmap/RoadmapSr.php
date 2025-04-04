<?php

namespace App\Http\Requests\Programming\Roadmap;

use Illuminate\Foundation\Http\FormRequest;

class RoadmapSr extends FormRequest
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
        'unique:roadmaps,name'
      ],

      'slug' => [
        'required',
        'min:3',
        'max:75',
        'unique:roadmaps,slug'
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
      'path_id.required' => 'Roadmap..path! harus di isi',

      'sr.required' => 'Roadmap..sorting! harus di isi',
      'sr.numeric' => 'Roadmap..sorting! harus angka',

      'name.required' => 'Roadmap..name! harus di isi',
      'name.min' => 'Roadmap..name! minimal 3 karakter',
      'name.max' => 'Roadmap..name! maksimal 75 karakter',
      'name.unique' => 'Roadmap..name! sudah terdaptar',

      'slug.required' => 'Roadmap..slug! harus di isi',
      'slug.min' => 'Roadmap..slug! minimal 3 karakter',
      'slug.max' => 'Roadmap..slug! maksimal 75 karakter',
      'slug.unique' => 'Roadmap..slug! sudah terdaptar',

      'status_id.required' => 'Roadmap..status! harus di isi',

      'image.image' => 'Roadmap..image! file yang di upload bukan image',
      'image.max' => 'Roadmap..image! ukuran image maksimal 2 mb',
    ];
  }
}
