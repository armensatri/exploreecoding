<?php

namespace App\Http\Controllers\Backend\Managedata;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticController extends Controller
{
  public function index()
  {
    return view('backend.managedata.statistic.index', [
      'title' => 'Statistic'
    ]);
  }
}
