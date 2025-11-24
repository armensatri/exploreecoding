<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\{
  Auth,
  Cache
};

class SuperadminController extends Controller
{
  public function index()
  {
    $superadmin = User::find(Auth::id());

    return view('backend.dashboard.superadmin', [
      'title' => 'Dashboard',
      'superadmin' => $superadmin
    ]);
  }
}
