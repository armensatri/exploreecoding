<?php

namespace App\Http\Controllers\Frontend\Path;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Programming\Path;

class PathController extends Controller
{
  public function index()
  {
    $paths = Path::query()
      ->select(['sp', 'name', 'slug', 'description'])
      ->orderBy('sp', 'asc')
      ->paginate(2);

    return view('frontend.path.index', [
      'title' => 'semua path',
      'paths' => $paths
    ]);
  }
}
