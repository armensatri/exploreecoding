<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
  public function index()
  {
    $user = Auth::user();

    return view('backend.account.personal.index', [
      'title' => 'Personal',
      'user' => $user,
    ]);
  }
}
