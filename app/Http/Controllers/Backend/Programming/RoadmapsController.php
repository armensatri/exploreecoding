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
use Illuminate\Support\Facades\Storage;

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
        'name',
        'url'
      ])
      ->with(['path:id,name'])
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
    return view('backend.programming.roadmaps.show', [
      'title' => 'Detail data roadmap',
      'roadmap' => $roadmap
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Roadmap $roadmap)
  {
    $statuses = Status::query()->select('id', 'name')
      ->orderBy('id', 'asc')
      ->get();

    $paths = Path::query()->select('id', 'name')
      ->orderBy('id', 'asc')
      ->get();

    return view('backend.programming.roadmaps.edit', [
      'title' => 'Edit data roadmap',
      'roadmap' => $roadmap,
      'statuses' => $statuses,
      'paths' => $paths
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(RoadmapUr $request, Roadmap $roadmap)
  {
    $dataupdate = $request->validated();

    if ($request->hasFile('image')) {
      if (!empty($roadmap->image)) {
        Storage::delete($roadmap->image);
      }

      $dataupdate['image'] = $request->file('image')->store(
        '/programming/roadmaps'
      );
    }

    $roadmap->update($dataupdate);

    Alert::success(
      'success',
      'Data roadmap! berhasil di update.'
    );

    return redirect()->route('roadmaps.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Roadmap $roadmap)
  {
    if ($roadmap->image) {
      Storage::delete($roadmap->image);
    }

    Roadmap::destroy($roadmap->id);

    Alert::success(
      'success',
      'Data roadmap! berhasil di delete.'
    );

    return redirect()->route('roadmaps.index');
  }
}
