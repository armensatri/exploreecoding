<?php

namespace App\Http\Controllers\Backend\Monitoring;

use App\Http\Controllers\Controller;

class UserregionController extends Controller
{
  public function index()
  {
    return view('backend.monitoring.userregion.index', [
      'title' => 'Monitoring user region'
    ]);
  }
}
