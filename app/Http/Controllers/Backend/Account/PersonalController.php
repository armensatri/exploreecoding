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
    $userId = Auth::id();

    $cacheKey = 'personal.user.'
      . User::cacheVersion() . '.'
      . $userId;

    $user = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      fn() => User::query()
        ->select([
          'id',
          'username',
          'email',
          'image'
        ])->findOrFail($userId)
    );

    return view('backend.account.personal.index', [
      'title' => 'Personal',
      'user' => $user
    ]);
  }
}
