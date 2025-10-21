<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditorController extends Controller
{
  public function index()
  {
    $editor = User::find(Auth::id());

    return view('backend.dashboard.editor', [
      'title' => 'Dashboard',
      'editor' => $editor
    ]);
  }
}
