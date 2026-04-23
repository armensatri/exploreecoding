<?php

namespace App\Http\Requests\Managemenu\Submenu;

use Illuminate\Foundation\Http\FormRequest;

class SubmenuSr extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'menu_id' => [
        'required'
      ],

      'ssm' => [
        'required',
        'numeric'
      ],

      'name' => [
        'required',
        'min:3',
        'max:75',
        'unique:submenus,name'
      ],

      'slug' => [
        'required',
        'min:3',
        'max:75',
        'unique:submenus,slug'
      ],

      'route' => [
        'required'
      ],

      'active' => [
        'required'
      ],

      'routename' => [
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
      'menu_id.required' => 'Submenu..menu! harus di isi',

      'ssm.required' => 'Submenu..sorting! harus di isi',
      'ssm.numeric' => 'Submenu..sorting! hanya boleh angka',

      'name.required' => 'Submenu..name! harus di isi',
      'name.min' => 'Submenu..name! minimal 3 karalter',
      'name.max' => 'Submenu..name! maksimal 75 karakter',
      'name.unique' => 'Submenu..name! sudah terdaptar',

      'slug.required' => 'Submenu..slug! harus di isi',
      'slug.min' => 'Submenu..slug! minimal 3 karakter',
      'slug.max' => 'Submenu..slug! maksimal 75 karakter',
      'slug.unique' => 'Submenu..slug! sudah terdaptar',

      'route.required' => 'Submenu..route! harus di isi',

      'active.required' => 'Submenu..active! harus di isi',

      'routename.required' => 'Submenu..routename! harus di isi',

      'description.required' => 'Submenu..description! harus di isi',
    ];
  }
}
