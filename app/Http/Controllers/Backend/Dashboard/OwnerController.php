<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
  public function index()
  {
    return view('backend.dashboard.owner', [
      'title' => 'Exp | owner'
    ]);
  }
}
