<?php

namespace App\Http\Requests\Tipscoding\Tipscoding;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TipscodingCommentUr extends FormRequest
{
  public function authorize(): bool
  {
    return Auth::check();
  }

  public function rules(): array
  {
    return [
      'comment' => [
        'required',
        'string',
        'min:3',
        'max:2000',
      ],

      'parent_id' => [
        'nullable',
        'integer',
      ],
    ];
  }

  public function messages(): array
  {
    return [
      'comment.required' => 'Komentar haru di isi',
      'comment.min' => 'Komentar minimal 3 karakter',
      'comment.max' => 'Komentar maksimal 2000 karakter',
      'parent_id.integer' => 'Parent comment tidak valid',
    ];
  }
}
