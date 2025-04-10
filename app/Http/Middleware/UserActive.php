<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Manageuser\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserActive
{
  public function handle(Request $request, Closure $next): Response
  {
    User::where(
      'id',
      Auth::user()->id
    )->update(['last_seen' => Carbon::now()]);

    return $next($request);
  }
}
