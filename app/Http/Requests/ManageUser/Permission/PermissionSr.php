<?php

namespace App\Http\Requests\Manageuser\Permission;

use Illuminate\Foundation\Http\FormRequest;

class PermissionSr extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'name' => [
        'required',
        'unique:permissions,name'
      ],
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'Permission..name! harus di isi',
      'name.unique' => 'Permission..name! sudah terdaptar',
    ];
  }
}
