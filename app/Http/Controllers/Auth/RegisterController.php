<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Manageuser\Role;
use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Auth\Register\RegisterSr;

class RegisterController extends Controller
{
  public function index()
  {
    return view('auth.register.index', [
      'title' => 'Exp | register'
    ]);
  }

  public function store(RegisterSr $request)
  {
    $limitUser = User::count();

    if ($limitUser >= 6) {
      Alert::warning(
        'Oops...',
        'Registrasi pendaftaran! masih terbatas'
      );

      return redirect()->route('register');
    }

    $dataStore = $request->validated();

    $role = Role::where('id', 5)->first();

    if (!$role) {
      Alert::warning('Oops...', 'Register! belum di buka');
      return redirect()->back();
    }

    $dataStore['role_id'] = $role->id;

    User::create($dataStore);

    Alert::success(
      'success',
      'Akun anda telah di buat! login sekarang'
    );

    return redirect()->route('login');
  }
}
