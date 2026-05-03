<?php

namespace App\Http\Requests\Programming\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostSr extends FormRequest
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

      'playlist_id' => [
        'required'
      ],

      'sp' => [
        'required',
        'numeric'
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
      'status_id.required' => 'Post..status! harus di isi',

      'playlist_id.required' => 'Post..playlist! harus di isi',

      'sp.required' => 'Post..sorting! harus di isi',
      'sp.numeric' => 'Post..sorting! hanya boleh angka',

      'title.required' => 'Post..title! harus di isi',
      'title.min' => 'Post..title! minimal 3 karakter',
      'title.max' => 'Post..title! maksimal 128 karakter',

      'slug.required' => 'Post..slug! harus di isi',
      'slug.min' => 'Post..slug! minimal 3 karakter',
      'slug.max' => 'Post..slug! maksimal 128 karakter',

      'excerpt.required' => 'Post..excerpt! harus di isi',

      'content.required' => 'Post..content! harus di isi',

      'image.image' => 'Post..image! file yang di upload bukan image',
      'image.max' => 'Post..image! ukuran image maksimal 2 mb',
      'image.mimes' => 'Post..image! type image hanya boleh png, jpg, png, dan webp',
    ];
  }
}
