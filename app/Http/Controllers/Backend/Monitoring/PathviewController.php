<?php

namespace App\Http\Controllers\Backend\Monitoring;

use App\Http\Controllers\Controller;
use App\Models\Programming\Path;

class PathviewController extends Controller
{
  public function index()
  {
    $getstarted = Path::query()
      ->select([
        'id',
        'sp',
        'name',
      ])
      ->where('sp', 1)
      ->withCount('pathviews')
      ->first();

    $paths = Path::query()
      ->select([
        'id',
        'sp',
        'name',
      ])
      ->where('sp', '!=', 1)
      ->withCount('pathviews')
      ->orderByDesc('pathviews_count')
      ->paginate(9)
      ->withQueryString();

    $paths->prepend($getstarted);

    return view('backend.monitoring.pathview.index', [
      'title' => 'Monitoring path view',
      'paths' => $paths,
    ]);
  }
}
