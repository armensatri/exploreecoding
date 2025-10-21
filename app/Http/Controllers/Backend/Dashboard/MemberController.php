<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
  public function index()
  {
    $member = User::find(Auth::id());

    return view('backend.dashboard.member', [
      'title' => 'Dashboard',
      'member' => $member
    ]);
  }
}
