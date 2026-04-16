<?php

namespace App\Http\Controllers\Auth;

use App\Models\Manageuser\Role;
use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Auth\Register\RegisterSr;

class RegisterController extends Controller
{
  public function index()
  {
    return view('auth.register.index', [
      'title' => 'Register'
    ]);
  }

  public function store(RegisterSr $request)
  {
    $usercount = User::count();

    if ($usercount >= 1000) {
      Alert::warning('Oops...', 'pendaftaran! masih terbatas');
      return Redirect::route('register');
    }

    $datastore = $request->validated();
    $assignrole = Role::where('id', 4)->first();

    if (!$assignrole) {
      Alert::warning('Oops...', 'registrasi! masih tertutup');
      return Redirect::route('register');
    }

    $datastore['role_id'] = $assignrole->id;

    User::create($datastore);

    Alert::success(
      'success',
      'Akun anda telah di buat! login sekarang'
    );

    return Redirect::route('login');
  }
}
