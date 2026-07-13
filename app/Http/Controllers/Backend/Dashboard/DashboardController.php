<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  public function index()
  {
    $user = Auth::user();

    return view('backend.dashboard.index', [
      'title' => 'Dashboard',
      'user'  => $user,
    ]);
  }
}
