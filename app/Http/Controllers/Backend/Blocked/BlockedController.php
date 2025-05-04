<?php

namespace App\Http\Controllers\Backend\Blocked;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlockedController extends Controller
{
  public function blocked()
  {
    return view('backend.blocked.blocked', [
      'title' => 'Access blocked'
    ]);
  }
}
