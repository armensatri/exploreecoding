<?php

namespace App\Http\Controllers\Backend\Managedata;

use Illuminate\Http\Request;
use App\Models\Programming\Path;
use App\Http\Controllers\Controller;
use App\Models\Programming\Roadmap;

class SilabusController extends Controller
{
  public function index()
  {
    $paths = Path::query()
      ->select([
        'id',
        'name',
        'sp',
        'status_id',
        'description',
      ])
      ->with([
        'status:id,name,bg,text',
        'roadmaps:id,path_id,status_id,sr,name',
        'roadmaps.status:id,name,bg,text',
      ])
      ->orderBy('id', 'asc')
      ->get();

    return view('backend.managedata.silabus.index', [
      'title' => 'Silabus',
      'paths' => $paths
    ]);
  }
}
