<?php

namespace App\Http\Requests\Auth\Register;

use Illuminate\Foundation\Http\FormRequest;

class RegisterSr extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }
}
