<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Auth\Login\LoginSr;
use Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller
{
  public function index()
  {
    return view('auth.login.index', [
      'title' => 'Exp | login'
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
        "Silakan coba lagi dalam $seconds detik."
      );

      return redirect()->route('login');
    }

    if (Auth::attempt($datastore)) {
      $request->session()->regenerate();

      RateLimiter::clear($key);

      User::where('id', Auth::user()->id)
        ->update(['status' => 1]);

      $mapRoutes = [
        'owner' => 'owner',
        'superadmin' => 'superadmin',
        'admin' => 'admin',
        'concreat' => 'concreat',
        'member' => 'member'
      ];

      $role = Auth::user()->role->name ?? '';
      $route = $mapRoutes[$role] ?? '';

      if ($route) {
        return redirect()->route($route);
      } else {
        Alert::error(
          'error',
          'Anda tidak memiliki akses'
        );

        return redirect()->route('login');
      }
    } else {
      RateLimiter::hit($key, 60);

      Alert::error(
        'error',
        'Login gagal! email atau password salah'
      );

      return redirect()->route('login');
    }
  }
}
