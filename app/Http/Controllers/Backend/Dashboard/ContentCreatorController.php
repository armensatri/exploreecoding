<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Helpers\LoginAccess;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContentCreatorController extends Controller
{
  public function __construct()
  {
    LoginAccess::Menu();
  }

  public function index()
  {
    $concreat = Auth::user();

    return view('backend.dashboard.concreat', [
      'title' => 'Dashboard content creator',
      'concreat' => $concreat
    ]);
  }
}
