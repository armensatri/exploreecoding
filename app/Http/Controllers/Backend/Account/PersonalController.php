<?php

namespace App\Http\Controllers\Backend\Account;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
    $userId = Auth::id();
    $cacheKey = "account_personal_{$userId}";

    $user = Cache::remember(
      $cacheKey,
      Carbon::now()->addMinutes(5),
      function () use ($userId) {
        return User::find($userId);
      }
    );

    return view('backend.account.personal.index', [
      'title' => 'Personal',
      'user' => $user
    ]);
  }
}
