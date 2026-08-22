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
      'email' => [
        'required',
        'email:rfc.dns',
      ],

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

      'gender' => [
        'required',
        'string',
        'in:male,female',
      ],

      'threads' => [
        'nullable',
        'string',
        'max:50',
      ],

      'instagram' => [
        'nullable',
        'string',
        'max:50',
      ],

      'x' => [
        'nullable',
        'string',
        'max:50',
      ],

      'facebook' => [
        'nullable',
        'string',
        'max:50',
      ],

      'tiktok' => [
        'nullable',
        'string',
        'max:50',
      ],

      'github' => [
        'nullable',
        'string',
        'max:50',
      ],

      'linkedin' => [
        'nullable',
        'string',
        'max:50',
      ],
    ];
  }

  public function messages(): array
  {
    return [
      'email.required' => 'User..email! harus di isi',
      'email.email' => 'User..email! tidak valid',

      'name.required' => 'User..name! harus di isi',
      'name.min' => 'User..name! minimal 4 karakter',
      'name.max' => 'User..name! maksimal 25 karakter',
      'name.regex' => 'User..name! hanya boleh huruf kecil atau besar saja',

      'username.required' => 'User..username! harus di isi',
      'username.min' => 'User..username! minimal 4 karakter',
      'username.max' => 'User..username! maksimal 10 karakter',
      'username.regex' => 'User..username! hanya boleh huruf kecil saja dan tanpa spasi',
      'username.unique' => 'User..username! sudah terdaptar',

      'image.image' => 'User..image! file yang di upload bukan image',
      'image.max' => 'User..image! ukuran image maksimal 2 mb',
      'image.mimes' => 'User..image! type image hanya boleh png, jpg, jpeg, dan webp',

      'province_code.required' => 'Provinsi wajib dipilih.',
      'province_code.exists' => 'Provinsi yang dipilih tidak valid.',

      'city_code.required' => 'Kabupaten/Kota wajib dipilih.',
      'city_code.exists' => 'Kabupaten/Kota tidak sesuai dengan Provinsi yang dipilih.',

      'district_code.required' => 'Kecamatan wajib dipilih.',
      'district_code.exists' => 'Kecamatan tidak sesuai dengan Kabupaten/Kota yang dipilih.',

      'gender.required' => 'User..gender! harus dipilih',
      'gender.string' => 'User..gender! tidak valid',
      'gender.in' => 'User..gender! hanya boleh laki-laki atau perempuan',

      'threads.string' => 'User..threads! harus berupa username',
      'threads.max' => 'User..threads! maksimal 50 karakter',

      'instagram.string' => 'User..instagram! harus berupa username',
      'instagram.max' => 'User..instagram! maksimal 50 karakter',

      'x.string' => 'User..x! harus berupa username',
      'x.max' => 'User..x! maksimal 50 karakter',

      'facebook.string' => 'User..facebook! harus berupa username',
      'facebook.max' => 'User..facebook! maksimal 50 karakter',

      'tiktok.string' => 'User..tiktok! harus berupa username',
      'tiktok.max' => 'User..tiktok! maksimal 50 karakter',

      'github.string' => 'User..github! harus berupa username',
      'github.max' => 'User..github! maksimal 50 karakter',

      'linkedin.string' => 'User..linkedin! harus berupa username',
      'linkedin.max' => 'User..linkedin! maksimal 50 karakter',
    ];
  }
}
