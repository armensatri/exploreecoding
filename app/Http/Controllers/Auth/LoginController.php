<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Auth\Login\LoginSr;

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
    $dataStore = $request->validated();

    if (Auth::attempt($dataStore)) {
      $request->session()->regenerate();

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
      Alert::error(
        'error',
        'Login gagal! email atau password salah'
      );

      return redirect()->route('login');
    }
  }
}
