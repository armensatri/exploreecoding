<?php

namespace App\Http\Controllers\Frontend\Support;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{
  public function index()
  {
    return view('frontend.support.contact.index', [
      'title' => 'Contact'
    ]);
  }
}
