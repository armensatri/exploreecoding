<?php

namespace App\Http\Controllers\Backend\Managedata;

use App\Http\Controllers\Controller;

class MonitoringController extends Controller
{
  public function index()
  {
    return view('backend.managedata.monitoring.index', [
      'title' => 'Monitoring data system'
    ]);
  }
}
