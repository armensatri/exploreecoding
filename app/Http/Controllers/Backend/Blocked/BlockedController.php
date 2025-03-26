<?php

namespace App\Http\Controllers\Backend\Blocked;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlockedController extends Controller
{
  public function blocked()
  {
    return view('backend.blocked.blocked', [
      'title' => 'Access blocked'
    ]);
  }

  public function blockedpermission()
  {
    return view('backend.blocked.permission', [
      'title' => 'permission blocked'
    ]);
  }
}
