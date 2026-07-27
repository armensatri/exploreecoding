<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Login\LoginSr;
use App\Models\Manageuser\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
  public function index()
  {
    return view('auth.login.index', [
      'title' => 'Login',
    ]);
  }

  public function store(LoginSr $request)
  {
    $datastore = $request->validated();
    $key = Str::lower($request->email) . '|' . $request->ip();

    if (RateLimiter::tooManyAttempts($key, 5)) {
      $seconds = RateLimiter::availableIn($key);

      Alert::error(
        'Terlalu banyak percobaan',
        "Silahkan coba lagi dalam $seconds detik."
      );

      return Redirect::route('login');
    }

    if (Auth::attempt($datastore)) {
      User::where('id', Auth::id())->update([
        'status_on_of' => 1,
        'last_seen' => now(),
      ]);

      $request->session()->regenerate();

      RateLimiter::clear($key);

      return Redirect::route('dashboard');
    }

    RateLimiter::hit($key, 60);

    Alert::error('Login gagal', 'email atau password salah');

    return Redirect::route('login');
  }
}
