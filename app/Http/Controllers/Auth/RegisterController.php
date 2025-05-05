<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Manageuser\Role;
use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\RateLimiter;
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
    $key = $request->ip();

    if (RateLimiter::tooManyAttempts($key, 5)) {
      $seconds = RateLimiter::availableIn($key);

      Alert::error(
        'Terlalu banyak percobaan',
        "Silakan coba lagi dalam $seconds detik."
      );

      return redirect()->route('register');
    }

    $limitUser = User::count();

    if ($limitUser >= 100) {
      Alert::warning(
        'Oops...',
        'Registrasi pendaftaran! masih terbatas'
      );

      return redirect()->route('register');
    }

    $datastore = $request->validated();

    $role = Role::where('id', 5)->first();

    if (!$role) {
      Alert::warning('Oops...', 'Register! belum di buka');
      return redirect()->back();
    }

    $datastore['role_id'] = $role->id;

    User::create($datastore);

    RateLimiter::clear($key);

    Alert::success(
      'success',
      'Akun anda telah di buat! login sekarang'
    );

    return redirect()->route('login');
  }
}
