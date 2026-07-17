<?php

namespace App\Http\Controllers\Backend\View;

use App\Models\Programming\Path;
use App\Http\Controllers\Controller;

class ViewController extends Controller
{
  public function index()
  {
    return view('backend.view.index', [
      'title' => 'Data views content'
    ]);
  }

  public function viewpath()
  {
    $paths = Path::query()
      ->select([
        'id',
        'sp',
        'name'
      ])
      ->withCount('pathviews')
      ->orderByDesc('pathviews_count')
      ->paginate(10)
      ->withQueryString();

    return view('backend.view.path', [
      'title' => 'Data view path',
      'paths' => $paths
    ]);
  }
}
