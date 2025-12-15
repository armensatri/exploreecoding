<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\Programming\Path;
use App\Models\Published\Status;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $paths = Path::select('id', 'sp', 'name', 'status_id', 'description')
      ->with('status:id,bg,name,text')
      ->orderBy('sp', 'asc')
      ->get();

    return view('frontend.home.index', [
      'title' => 'Home',
      'paths' => $paths
    ]);
  }
}
