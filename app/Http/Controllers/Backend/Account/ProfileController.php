<?php

namespace App\Http\Controllers\Backend\Account;

use Illuminate\Http\Request;
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
    $user = User::find(Auth::id());

    return view('backend.account.profile.index', [
      'title' => 'My profile',
      'user' => $user
    ]);
  }

  public function edit()
  {
    $user = User::find(Auth::id());

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
