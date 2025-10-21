<?php

namespace App\Http\Controllers\Backend\Account;

use Illuminate\Http\Request;
use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Account\ChangePassword\ChangePasswordUr;

use Illuminate\Support\Facades\{
  Auth,
  Hash,
};

class ChangePasswordController extends Controller
{
  public function index()
  {
    $user = User::find(Auth::id());

    return view('backend.account.changepassword.index', [
      'title' => 'Change password',
      'user' => $user
    ]);
  }

  public function edit()
  {
    $user = User::find(Auth::id());

    return view('backend.account.changepassword.edit', [
      'title' => 'Change password edit',
      'user' => $user
    ]);
  }

  public function update(ChangePasswordUr $request)
  {
    $user = User::find(Auth::id());

    $user->update([
      'password' => Hash::make($request->password)
    ]);

    Alert::success(
      'success',
      'Data password! berhasil di update.'
    );

    return redirect()->route('changepassword');
  }
}
