<?php

namespace App\Http\Requests\Programming\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostUr extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
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
        'max:128',
      ],

      'excerpt' => [
        'required'
      ],

      'content' => [
        'required'
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
      'playlist_id.required' => 'Post..playlist! harus di isi',

      'sp.required' => 'Post..sorting! harus di isi',
      'sp.numeric' => 'Post..sorting! harus angka',

      'title.required' => 'Post..title! harus di isi',
      'title.min' => 'Post..title! minimal 3 karakter',
      'title.max' => 'Post..title! maksimal 128 karakter',

      'slug.required' => 'Post..slug! harus di isi',
      'slug.min' => 'Post..slug! minimal 3 karakter',
      'slug.max' => 'Post..slug! maksimal 128 karakter',

      'excerpt.required' => 'Post..excerpt! harus di isi',

      'content.required' => 'Post..content! harus di isi',

      'status_id.required' => 'Post..status! harus di isi',

      'image.image' => 'Post..image! file yang di upload bukan image',
      'image.max' => 'Post..image! ukuran image maksimal 2 mb',
    ];
  }
}
