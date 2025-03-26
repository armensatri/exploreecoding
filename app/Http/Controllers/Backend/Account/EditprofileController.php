<?php

namespace App\Http\Controllers\Backend\Account;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Helpers\Submenuaccess;
use App\Models\Manageuser\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Account\Editprofile\EditprofileUr;

class EditprofileController extends Controller
{
  public function __construct()
  {
    Submenuaccess::Submenu();
  }

  public function edit()
  {
    $user = Auth::user();

    return view('backend.account.edit-profile', [
      'title' => 'Edit profile ' . $user->username,
      'user' => $user
    ]);
  }

  public function update(EditprofileUr $request, User $user)
  {
    $user = Auth::user();

    $dataupdate = $request->validated();

    if ($request->hasFile('image')) {
      if (!empty($user->image)) {
        Storage::delete($user->image);
      }

      $dataupdate['image'] = $request->file('image')->store(
        '/manageuser/users'
      );
    }

    Auth::user()->update($dataupdate);

    Alert::success(
      'success',
      'Profile! berhasil di update.'
    );

    return redirect()->route('profile');
  }
}
