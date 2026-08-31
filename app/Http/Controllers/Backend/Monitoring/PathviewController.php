<?php

namespace App\Http\Controllers\Backend\Monitoring;

use App\Http\Controllers\Controller;
use App\Models\Programming\Path;

class PathviewController extends Controller
{
  public function index()
  {
    $paths = Path::query()
      ->search(request(['search']))
      ->select([
        'id',
        'sp',
        'name',
      ])
      ->withCount('pathviews')
      ->orderByDesc('pathviews_count')
      ->paginate(10)
      ->withQueryString();

    return view('backend.monitoring.pathview.index', [
      'title' => 'Monitoring path view',
      'paths' => $paths,
    ]);
  }
}
