<?php

namespace App\Http\Controllers\Backend\Programming;

use App\Helpers\RandomUrl;
use Illuminate\Http\Request;
use App\Models\Published\Status;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Programming\{
  Path,
  Roadmap,
};

use App\Http\Requests\Programming\Roadmap\{
  RoadmapSr,
  RoadmapUr,
};


class RoadmapsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $roadmaps = Roadmap::query()
      ->search(request(['search', 'path']))
      ->select([
        'id',
        'path_id',
        'sr',
        'image',
        'name',
        'status_id',
        'url'
      ])
      ->with(['status:id,name,bg,text', 'path:id,name'])
      ->orderBy('path_id', 'asc')
      ->paginate(15)
      ->withQueryString();

    return view('backend.programming.roadmaps.index', [
      'title' => 'Semua data roadmaps',
      'roadmaps' => $roadmaps
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Roadmap $roadmap)
  {
    $statuses = Status::query()->select('id', 'name')
      ->orderBy('id', 'asc')
      ->get();

    $paths = Path::query()->select('id', 'name')
      ->orderBy('id', 'asc')
      ->get();

    return view('backend.programming.roadmaps.create', [
      'title' => 'Create data roadmap',
      'roadmap' => $roadmap,
      'statuses' => $statuses,
      'paths' => $paths
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(RoadmapSr $request)
  {
    $datastore = $request->validated();

    $datastore['url'] = RandomUrl::generateUrl();

    if ($request->hasFile('image')) {
      $datastore['image'] = $request->file('image')->store(
        '/programming/roadmaps'
      );
    }

    Roadmap::create($datastore);

    Alert::success(
      'success',
      'Data roadmap! berhasil di tambahkan.'
    );

    return redirect()->route('roadmaps.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Roadmap $roadmap)
  {
    // ini lagi ya
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Roadmap $roadmap)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(RoadmapUr $request, Roadmap $roadmap)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Roadmap $roadmap)
  {
    //
  }
}
