<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
  public function index()
  {
    $owner = User::find(Auth::id());

    return view('backend.dashboard.owner', [
      'title' => 'Dashboard',
      'owner' => $owner
    ]);
  }
}
