<?php

namespace App\Http\Controllers\Backend\Managedata;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Programming\Path;
use App\Models\Programming\Playlist;
use App\Models\Programming\Post;

class SilabusController extends Controller
{
  public function index()
  {
    return view('back');
  }

  public function show()
  {
    $paths = Path::with([
      'status',
      'roadmaps' => function ($query) {
        $query->with('status')
          ->orderBy('sr', 'asc')->with([
            'playlists' => function ($q) {
              $q->with('status')
                ->orderBy('spl', 'asc')->with([
                  'posts' => function ($p) {
                    $p->with('status')
                      ->orderBy('sp', 'asc');
                  }
                ]);
            }
          ]);
      }
    ])->orderBy('sp', 'asc')->get();

    return view('backend.managedata.silabus.index', [
      'title' => 'Data silabus content',
      'paths' => $paths,
    ]);
  }
}
