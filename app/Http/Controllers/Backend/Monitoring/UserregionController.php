<?php

namespace App\Http\Controllers\Backend\Monitoring;

use App\Http\Controllers\Controller;
use App\Models\Manageuser\User;
use Laravolt\Indonesia\Models\Province;

class UserregionController extends Controller
{
  public function index()
  {
    $provinces = Province::query()
      ->select([
        'code',
        'name',
      ])
      ->orderBy('code', 'asc')
      ->get();

    $province = request('province', []);

    $users = User::query()
      ->search(request(['search', 'username']))
      ->select([
        'id',
        'image',
        'username',
        'province_code',
        'city_code',
        'district_code',
      ])
      ->with([
        'province',
        'city',
        'district',
      ])
      ->when($province, function ($query) use ($province) {
        $query->whereIn('province_code', $province);
      })
      ->orderBy('id', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.monitoring.userregion.index', [
      'title' => 'Monitoring user region',
      'users' => $users,
      'provinces' => $provinces,
    ]);
  }
}
