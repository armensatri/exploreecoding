<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\Profile\ProfileUr;
use App\Models\Manageuser\User;
use App\Traits\Controller\ImageUpdate;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
  use ImageUpdate;

  public function index()
  {
    $user = Auth::user();

    return view('backend.account.profile.index', [
      'title' => 'My profile',
      'user' => $user
    ]);
  }

  public function edit()
  {
    $user = Auth::user();

    return view('backend.account.profile.edit', [
      'title' => 'Profile edit',
      'user' => $user
    ]);
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

    return redirect()->route('profile');
  }
}
