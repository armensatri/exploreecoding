<?php

namespace App\Http\Controllers\Backend\Programming;

use App\Helpers\RandomUrl;
use App\Http\Controllers\Controller;
use App\Http\Requests\Programming\Roadmap\RoadmapSr;
use App\Http\Requests\Programming\Roadmap\RoadmapUr;
use App\Models\Programming\Path;
use App\Models\Programming\Roadmap;
use App\Models\Published\Status;
use App\Traits\Controller\ImageStore;
use App\Traits\Controller\ImageUpdate;
use Illuminate\Support\Facades\Cache;
use RealRashid\SweetAlert\Facades\Alert;

class RoadmapsController extends Controller
{
  use ImageStore, ImageUpdate;

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $filters = request(['search', 'path', 'status']);

    $cacheKey = 'roadmaps.index.ids.'
      . Roadmap::cacheVersion() . '.'
      . md5(json_encode($filters));

    $ids = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      fn() => Roadmap::query()
        ->search($filters)
        ->orderBy('path_id', 'asc')
        ->pluck('id')
        ->toArray()
    );

    $roadmaps = Roadmap::query()
      ->whereIn('id', $ids)
      ->select([
        'id',
        'path_id',
        'sr',
        'name',
        'status_id',
        'url'
      ])
      ->with([
        'path:id,name',
        'status:id,name,bg,text'
      ])
      ->orderBy('path_id', 'asc')
      ->paginate(10)
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

    $datastore['image'] = $this->handleImageStore(
      $request,
      'image',
      'programming/roadmaps'
    );

    $roadmap = Roadmap::create($datastore);

    Alert::html(
      'success',
      "Data roadmap!
        <span style='color:#2563eb;'>
          {$roadmap->name}
        </span> berhasil di tambahkan",
      'success'
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
