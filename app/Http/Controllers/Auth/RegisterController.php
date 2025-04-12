<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Manageuser\User;
use App\Models\Manageuser\Role;
use App\Http\Controllers\Controller;
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
    $userCount = User::count();

    if ($userCount >= 5) {
      Alert::warning(
        'warning',
        'Registrasi pendaftaran! masih tertutup.'
      );

      return redirect()->route('register');
    }

    $datastore = $request->validated();

    $role = Role::where('id', 4)->first();

    if (!$role) {
      Alert::error('error', 'registrasi! belum di buka');
      return redirect()->back();
    }

    $datastore['role_id'] = $role->id;

    User::create($datastore);

    Alert::success(
      'success',
      'Akun anda telah di buat! login sekarang'
    );

    return redirect()->route('login');
  }
}
