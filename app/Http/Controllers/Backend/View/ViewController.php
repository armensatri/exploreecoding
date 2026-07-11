<?php

namespace App\Http\Controllers\Backend\View;

use App\Http\Controllers\Controller;
use App\Models\Programming\Path;

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
      ->orderBy('sp', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.view.path', [
      'title' => 'Data view path',
      'paths' => $paths
    ]);
  }
}
