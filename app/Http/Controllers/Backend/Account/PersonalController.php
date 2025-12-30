<?php

namespace App\Http\Controllers\Backend\Account;

use Illuminate\Http\Request;
use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\{
  Auth,
  Cache
};


class PersonalController extends Controller
{
  public function index()
  {


    return view('backend.account.personal.index', [
      'title' => 'Personal',
      // 'user' => $user
    ]);
  }
}
