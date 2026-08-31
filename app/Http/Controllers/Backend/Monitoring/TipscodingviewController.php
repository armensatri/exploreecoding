<?php

namespace App\Http\Controllers\Backend\Monitoring;

use App\Http\Controllers\Controller;
use App\Models\Tipscoding\Tipscoding;

class TipscodingviewController extends Controller
{
  public function index()
  {
    $tipscodings = Tipscoding::query()
      ->search(request(['search']))
      ->select([
        'id',
        'title',
      ])
      ->withCount('tipscodingviews')
      ->orderByDesc('tipscodingviews_count')
      ->paginate(10)
      ->withQueryString();

    return view('backend.monitoring.tipscodingview.index', [
      'title' => 'Monitoring tipscoding view',
      'tipscodings' => $tipscodings
    ]);
  }
}
