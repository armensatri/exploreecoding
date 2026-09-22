<?php

namespace App\Http\Requests\Frontend\Tipscoding;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TipscodingCommentReportUr extends FormRequest
{
  public function authorize(): bool
  {
    return Auth::check();
  }

  public function rules(): array
  {
    return [
      'reason' => [
        'required',
        Rule::in([
          'spam',
          'irrelevant',
          'inappropriate',
          'violation',
          'other',
        ]),
      ],

      'description' => [
        'nullable',
        'string',
        'max:1000',
      ],
    ];
  }

  public function messages(): array
  {
    return [
      'reason.required' => 'Silakan pilih alasan laporan.',
      'reason.in' => 'Alasan laporan tidak valid.',
      'description.max' => 'Keterangan maksimal 1000 karakter.',
    ];
  }
}
