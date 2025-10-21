<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WritingController extends Controller
{
  public function index()
  {
    $writing = User::find(Auth::id());

    return view('backend.dashboard.writing', [
      'title' => 'Dashboard',
      'writing' => $writing
    ]);
  }
}
