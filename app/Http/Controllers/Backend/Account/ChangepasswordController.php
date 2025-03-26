<?php

namespace App\Http\Controllers\Backend\Account;

use Illuminate\Http\Request;
use App\Helpers\Submenuaccess;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Account\Changepassword\ChangepasswordUr;

class ChangepasswordController extends Controller
{
  public function __construct()
  {
    Submenuaccess::Submenu();
  }

  public function index()
  {
    return view('backend.account.change-password', [
      'title' => 'Change password'
    ]);
  }

  public function update(ChangepasswordUr $request)
  {
    Auth::user()->update([
      'password' => Hash::make($request->password_baru),
    ]);

    Alert::success(
      'success',
      'Change password! berhasil di update.'
    );

    return redirect()->route('change.password');
  }
}
