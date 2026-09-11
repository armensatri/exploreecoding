<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\Sosmed;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
  public function index()
  {
    $user = Auth::user();

    $sosmed = Sosmed::query()
      ->where('user_id', Auth::id())
      ->first();

    return view('backend.account.personal.index', [
      'title' => 'Personal for profile public',
      'user' => $user,
      'sosmed' => $sosmed
    ]);
  }
}
