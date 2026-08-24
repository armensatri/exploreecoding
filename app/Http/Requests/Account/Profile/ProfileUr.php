<?php

namespace App\Http\Requests\Account\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileUr extends FormRequest
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
        'min:4',
        'max:25',
        'regex:/^[a-zA-Z\s]+$/',
      ],

      'username' => [
        'required',
        'min:4',
        'max:10',
        'regex:/^[a-z]+$/',
        'unique:users,username,' . Auth::id(),
      ],

      'email' => [
        'required',
        'email:rfc.dns',
      ],

      'gender' => [
        'required',
        'string',
        'in:LK,PR',
      ],

      'image' => [
        'nullable',
        'image',
        'max:2048',
        'mimes:png,jpg,jpeg,webp',
      ],

      'province_code' => [
        'required',
        'string',
        Rule::exists('indonesia_provinces', 'code'),
      ],

      'city_code' => [
        'required',
        'string',
        Rule::exists('indonesia_cities', 'code')
          ->where(function ($query) {
            $query->where(
              'province_code',
              $this->province_code
            );
          }),
      ],

      'district_code' => [
        'required',
        'string',
        Rule::exists('indonesia_districts', 'code')
          ->where(function ($query) {
            $query->where(
              'city_code',
              $this->city_code
            );
          }),
      ],

      'bio' => [
        'required'
      ]
    ];
  }

  public function messages(): array
  {
    return [
      'name.required' => 'Name! harus di isi',
      'name.min' => 'Name! minimal 4 karakter',
      'name.max' => 'Name! maksimal 25 karakter',
      'name.regex' => 'Name! hanya boleh huruf kecil atau besar saja',

      'username.required' => 'Username! harus di isi',
      'username.min' => 'Username! minimal 4 karakter',
      'username.max' => 'Username! maksimal 10 karakter',
      'username.regex' => 'Username! hanya boleh huruf kecil saja dan tanpa spasi',
      'username.unique' => 'Username! sudah terdaptar',

      'email.required' => 'Email! harus di isi',
      'email.email' => 'Eemail! tidak valid',

      'gender.required' => 'Gender! harus di isi',
      'gender.string' => 'Gender! tidak valid',
      'gender.in' => 'Gender! hanya boleh laki-laki atau perempuan',

      'image.image' => 'Image! file yang di upload bukan image',
      'image.max' => 'Image! ukuran image maksimal 2 mb',
      'image.mimes' => 'Image! type image hanya boleh png, jpg, jpeg, dan webp',

      'province_code.required' => 'Provinsi! harus di isi',
      'province_code.exists' => 'Provinsi! tidak valid',

      'city_code.required' => 'Kabupaten kota! harus di isi',
      'city_code.exists' => 'Kabupaten kota! tidak valid',

      'district_code.required' => 'Kecamatan! harus di isi',
      'district_code.exists' => 'Kecamatan! tidak valid',

      'bio.required' => 'Bio! harus di isi'
    ];
  }
}
