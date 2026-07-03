<?php

namespace App\Http\Controllers\Backend\View;

use App\Http\Controllers\Controller;

class ViewController extends Controller
{
  public function index()
  {
    return view('backend.view.index', [
      'title' => 'Data views content'
    ]);
  }
}
