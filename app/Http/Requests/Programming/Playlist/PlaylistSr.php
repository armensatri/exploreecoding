<?php

namespace App\Http\Requests\Programming\Playlist;

use Illuminate\Foundation\Http\FormRequest;

class PlaylistSr extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'roadmap_id' => [
        'required'
      ],

      'spl' => [
        'required',
        'numeric'
      ],

      'name' => [
        'required',
        'min:3',
        'max:75',
        'unique:playlists,name'
      ],

      'slug' => [
        'required',
        'min:3',
        'max:75',
        'unique:playlists,slug'
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
      'roadmap_id.required' => 'Playlist..roadmap! harus di isi',

      'spl.required' => 'Playlist..sorting! harus di isi',
      'spl.numeric' => 'Playlist..sorting! harus angka',

      'name.required' => 'Playlist..name! harus di isi',
      'name.min' => 'Playlist..name! minimal 3 karakter',
      'name.max' => 'Playlist..name! maksimal 75 karakter',
      'name.unique' => 'Playlist..name! sudah terdaptar',

      'slug.required' => 'Playlist..slug! harus di isi',
      'slug.min' => 'Playlist..slug! minimal 3 karakter',
      'slug.max' => 'Playlist..slug! maksimal 75 karakter',
      'slug.unique' => 'Playlist..slug! sudah terdaptar',

      'status_id.required' => 'Playlist..status! harus di isi',

      'image.image' => 'Playlist..image! file yang di upload bukan image',
      'image.max' => 'Playlist..image! ukuran image maksimal 2 mb',
    ];
  }
}
