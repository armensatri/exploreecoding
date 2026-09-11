<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\Sosmed\SosmedUr;
use App\Models\Account\Sosmed;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SosmedController extends Controller
{
  public function index()
  {
    $sosmeds = Sosmed::query()
      ->search(request(['search', 'username']))
      ->select([
        'id',
        'user_id',
        'linkedin',
        'github',
        'threads',
        'instagram',
        'x',
        'facebook',
        'tiktok',
      ])->with('user:id,email,username,image')
      ->orderBy('id', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.monitoring.usersosmed.index', [
      'title' => 'Monitoring user sosmed',
      'sosmeds' => $sosmeds
    ]);
  }

  public function edit()
  {
    $user = Auth::user();

    $sosmed = Sosmed::where('user_id', $user->id)->first();

    return view('backend.monitoring.usersosmed.edit', [
      'title' => 'Edit sosmed',
      'user' => $user,
      'sosmed' => $sosmed
    ]);
  }

  public function update(SosmedUr $request)
  {
    $user = Auth::user();

    Sosmed::updateOrCreate([
      'user_id' => $user->id
    ], $request->validated());

    Alert::html(
      'success',
      "Data user sosmed!
        <span style='color:#2563eb;'>
          @{$user->username}
        </span> berhasil di create/update",
      'success'
    );

    return redirect()->route('profile');
  }
}
