<?php

namespace App\Http\Requests\Published\Status;

use Illuminate\Foundation\Http\FormRequest;

class StatusUr extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'ss' => [
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

      'bg' => [
        'required'
      ],

      'text' => [
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
      'ss.required' => 'Status..sorting! harus di isi',
      'ss.numeric' => 'Status..sorting! hanya boleh angka saja',

      'name.required' => 'Status..name! harus di isi',
      'name.min' => 'Status..name! minimal 3 karakter',
      'name.max' => 'Status..name! maksimal 75 karakter',

      'slug.required' => 'Status..slug! harus di isi',
      'slug.min' => 'Status..slug! minimal 3 karakter',
      'slug.max' => 'Status..slug! maksimal 75 karakter',

      'bg.required' => 'Status..background! harus di isi',

      'text.required' => 'Status..text color! harus di isi',

      'description.required' => 'Status..description! harus di isi',
    ];
  }
}
