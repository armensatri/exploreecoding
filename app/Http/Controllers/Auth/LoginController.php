<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Auth\Login\LoginSr;

use Illuminate\Support\Facades\{
  Auth,
  Redirect,
  RateLimiter
};

class LoginController extends Controller
{
  public function index()
  {
    return view('auth.login.index', [
      'title' => 'Login'
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
        'last_seen' => Carbon::now('Asia/Jakarta')->format('d-m-Y H:i:s')
      ]);

      $request->session()->regenerate();

      RateLimiter::clear($key);

      $routeMap = [
        'owner' => 'owner',
        'superadmin' => 'superadmin',
        'admin' => 'admin',
        'writing' => 'writing',
        'editor' => 'editor',
        'member' => 'member'
      ];

      $user = Auth::user();
      $role = $user && $user->role ? $user->role->name : null;
      $route = $routeMap[$role] ?? null;

      if ($route) {
        return Redirect::route($route);
      }

      Alert::error('Akses di tolak', 'Anda tidak memiliki akses');
      Auth::logout();

      return Redirect::route('login');
    }

    RateLimiter::hit($key, 60);

    Alert::error('Login gagal', 'email atau password salah');
    return Redirect::route('login');
  }
}
