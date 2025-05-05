<?php

namespace App\Http\Requests\Manageuser\Permission;

use Illuminate\Foundation\Http\FormRequest;

class PermissionUr extends FormRequest
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
      ],
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'Permission..name! harus di isi',
    ];
  }
}
