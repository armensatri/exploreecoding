<?php

namespace App\Http\Controllers\Backend\Account;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Account\Profile\ProfileUr;

use Illuminate\Support\Facades\{
  Auth,
  Cache,
  Storage
};

class ProfileController extends Controller
{
  public function index()
  {
    $userId = Auth::id();
    $cacheKey = "account_profile_{$userId}";

    $user = Cache::remember(
      $cacheKey,
      Carbon::now()->addMinutes(5),
      function () use ($userId) {
        return User::find($userId);
      }
    );

    return view('backend.account.profile.index', [
      'title' => 'My profile',
      'user' => $user
    ]);
  }

  public function edit()
  {
    $userId = Auth::id();
    $cacheKey = "account_profile_edit_{$userId}";

    $user = Cache::remember(
      $cacheKey,
      Carbon::now()->addMinutes(5),
      function () use ($userId) {
        return User::find($userId);
      }
    );

    return view('backend.account.profile.edit', [
      'title' => 'Profile edit',
      'user' => $user
    ]);
  }

  public function update(ProfileUr $request)
  {
    $user = User::find(Auth::id());

    $dataupdate = $request->validated();

    if ($request->hasFile('image')) {
      if (!empty($user->image)) {
        Storage::delete($user->image);
      }

      $dataupdate['image'] = $request->file('image')->store(
        'manageuser/users'
      );
    }

    $user->update($dataupdate);

    Alert::success(
      'success',
      'Data profile berhasil di update.'
    );

    return redirect()->route('profile');
  }
}
