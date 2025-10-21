<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
  public function index()
  {
    $admin = User::find(Auth::id());

    return view('backend.dashboard.admin', [
      'title' => 'Dashboard',
      'admin' => $admin
    ]);
  }
}
