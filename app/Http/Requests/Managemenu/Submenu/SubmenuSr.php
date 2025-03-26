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
        'max:50',
        'unique:submenus,name'
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
      'menu_id.required' => 'Submenu..menu! harus di isi',

      'ssm.required' => 'Submenu..ssm! harus di isi',
      'ssm.numeric' => 'Submenu..ssm! harus angka',

      'name.required' => 'Submenu..name! harus di isi',
      'name.min' => 'Submenu..name! minimal 3 karakter',
      'name.max' => 'Submenu..name! maksimal 50 karakter',
      'name.unique' => 'Submenu..name! sudah terdaptar',

      'image.image' => 'Submenu..image! file yang di upload bukan image',
      'image.max' => 'Submenu..image! ukuran image maksimal 2 mb',
    ];
  }
}
