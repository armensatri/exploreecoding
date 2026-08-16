<?php

namespace App\Http\Controllers\Backend\View;

use App\Http\Controllers\Controller;
use App\Models\Programming\Path;
use App\Models\Tipscoding\Tipscoding;

class ViewController extends Controller
{
  public function index()
  {
    return view('backend.view.index', [
      'title' => 'Data views content',
    ]);
  }

  public function viewpath()
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

    return view('backend.view.path', [
      'title' => 'Data view path',
      'paths' => $paths,
    ]);
  }

  public function viewtipscoding()
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

    return view('backend.view.tipscoding', [
      'title' => 'Data view tipscoding',
      'tipscodings' => $tipscodings
    ]);
  }
}
