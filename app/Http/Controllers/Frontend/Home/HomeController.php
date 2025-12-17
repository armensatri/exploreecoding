<?php

namespace App\Http\Controllers\Frontend\Home;

use Illuminate\Http\Request;
use App\Models\Programming\Path;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
  public function index()
  {
    $paths = Path::query()
      ->select([
        'id',
        'sp',
        'name',
        'status_id',
        'description'
      ])
      ->with('status:id,bg,name,text')
      ->orderBy('sp', 'asc')
      ->get();

    return view('frontend.home.index', [
      'title' => 'Home',
      'paths' => $paths
    ]);
  }
}
