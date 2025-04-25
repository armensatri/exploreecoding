<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Register\RegisterSr;
use App\Models\Manageuser\User;
use RealRashid\SweetAlert\Facades\Alert;

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
        'Registrasi pendaftaran! belum di buka'
      );

      return redirect()->route('register');
    }

    $dataStore = $request->validated();
  }
}
