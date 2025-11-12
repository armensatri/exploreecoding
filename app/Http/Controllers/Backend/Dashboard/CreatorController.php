<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreatorController extends Controller
{
  public function index()
  {
    $creator = User::find(Auth::id());

    return view('backend.dashboard.creator', [
      'title' => 'Dashboard',
      'creator' => $creator
    ]);
  }
}
