<?php

namespace App\Http\Controllers\Backend\Managedata;

use Illuminate\Http\Request;
use App\Helpers\Submenuaccess;
use App\Models\Programming\Path;
use App\Http\Controllers\Controller;

class SilabusController extends Controller
{
  public function __construct()
  {
    Submenuaccess::Submenu();
  }

  public function index()
  {
    $paths = Path::with([
      'roadmaps' => function ($query) {
        $query->with([
          'playlists' => function ($q) {
            $q->with([
              'posts' // Tetap load relasi posts tanpa status
            ]);
          }
        ]);
      }
    ])->orderBy('sp', 'asc')->get();

    return view('backend.managedata.silabus.index', [
      'title' => 'Semua data silabus',
      'paths' => $paths
    ]);
  }


  public function show($slug)
  {
    $paths = Path::where('slug', $slug)->with([
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

    return view('backend.managedata.silabus.show', [
      'title' => 'Data silabus',
      'paths' => $paths,
    ]);
  }
}
