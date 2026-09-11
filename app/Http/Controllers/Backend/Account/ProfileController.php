<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\Profile\ProfileUr;
use App\Models\Account\Sosmed;
use App\Models\Manageuser\User;
use App\Traits\Controller\ImageUpdate;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
  use ImageUpdate;

  public function index()
  {
    $user = Auth::user();

    $genders = collect([
      (object) [
        'code' => 'LK',
        'name' => 'Male',
      ],
      (object) [
        'code' => 'PR',
        'name' => 'Female',
      ],
    ]);

    $gender = $genders->firstWhere('code', $user->gender);

    $sosmed = Sosmed::query()
      ->where('user_id', Auth::id())
      ->first();

    return view('backend.account.profile.index', [
      'title' => 'My profile',
      'user' => $user,
      'gender' => $gender,
      'sosmed' => $sosmed
    ]);
  }

  public function edit()
  {
    $user = Auth::user();

    $provinces = Province::query()
      ->orderBy('code', 'asc')
      ->get();

    $cities = City::query()
      ->where('province_code', $user->province_code)
      ->orderBy('code', 'asc')
      ->get();

    $districts = District::query()
      ->where('city_code', $user->city_code)
      ->orderBy('code', 'asc')
      ->get();

    $genders = collect([
      (object) [
        'code' => 'LK',
        'name' => 'Laki-laki',
      ],
      (object) [
        'code' => 'PR',
        'name' => 'Perempuan',
      ],
    ]);

    return view('backend.account.profile.edit', [
      'title' => 'Edit my account',
      'user' => $user,
      'provinces' => $provinces,
      'cities' => $cities,
      'districts' => $districts,
      'genders' => $genders,
    ]);
  }

  public function cities(string $provincecode): JsonResponse
  {
    $cities = City::query()
      ->where('province_code', $provincecode)
      ->orderBy('code', 'asc')
      ->get();

    return response()->json($cities);
  }

  public function districts(string $cityCode): JsonResponse
  {
    $districts = District::query()
      ->where('city_code', $cityCode)
      ->orderBy('code', 'asc')
      ->get();

    return response()->json($districts);
  }

  public function update(ProfileUr $request)
  {
    $user = User::find(Auth::id());

    $dataupdate = $request->validated();

    $dataupdate['image'] = $this->handleImageUpdate(
      $request,
      $user,
      'image',
      'manageuser/users'
    );

    $user->update($dataupdate);

    Alert::html(
      'success',
      "Data user!
        <span style='color:#2563eb;'>
            @{$user->username}
        </span> berhasil di update",
      'success'
    );

    return redirect()->route('personal');
  }
}
