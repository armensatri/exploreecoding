<?php

namespace App\Http\Controllers\Backend\Account;

use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Account\ChangePassword\ChangePasswordUr;

use Illuminate\Support\Facades\{
  Auth,
  Hash
};

class ChangePasswordController extends Controller
{
  public function index()
  {
    $user = Auth::user();

    return view('backend.account.changepassword.index', [
      'title' => 'Change Password',
      'user' => $user
    ]);
  }

  public function edit()
  {
    $user = Auth::user();

    return view('backend.account.changepassword.edit', [
      'title' => 'Change Password',
      'user' => $user
    ]);
  }

  public function update(ChangePasswordUr $request)
  {
    $user = User::find(Auth::id());

    $user->update([
      'password' => Hash::make($request->password)
    ]);

    Alert::html(
      'success',
      "Data change password!
        <span style='color:#2563eb;'>
          @{$user->username}
        </span> berhasil di update",
      'success'
    );

    return redirect()->route('changepassword');
  }
}
