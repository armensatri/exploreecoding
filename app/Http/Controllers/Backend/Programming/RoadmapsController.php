<?php

namespace App\Http\Controllers\Backend\Programming;

use App\Helpers\RandomUrl;
use Illuminate\Http\Request;
use App\Models\Published\Status;
use App\Models\Programming\Path;
use App\Models\Programming\Roadmap;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Programming\Roadmap\RoadmapSr;
use App\Http\Requests\Programming\Roadmap\RoadmapUr;
use Cviebrock\EloquentSluggable\Services\SlugService;

class RoadmapsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $roadmaps = Roadmap::search(request(['search', 'status', 'path']))
      ->select(['id', 'path_id', 'sr', 'image', 'name', 'status_id', 'url'])
      ->with(['path', 'playlists', 'status'])
      ->orderby('path_id', 'asc')
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
    $paths = Path::select('id', 'name')
      ->orderby('sp', 'asc')
      ->get();

    $statuses = Status::select('id', 'name')
      ->orderby('ss', 'asc')
      ->get();

    return view('backend.programming.roadmaps.create', [
      'title' => 'Create data roadmaps',
      'roadmap' => $roadmap,
      'paths' => $paths,
      'statuses' => $statuses
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(RoadmapSr $request)
  {
    $datastore = $request->validated();

    $datastore['url'] = $request->input('url')
      ?: RandomUrl::GenerateUrl();

    if ($request->hasFile('image')) {
      $datastore['image'] = $request->file('image')->store(
        '/programming/roadmaps'
      );
    }

    $datastore['status_id'] = $request->status_id;

    Roadmap::create($datastore);

    Alert::success(
      'success',
      'Data roadmap! berhasil di tambahkan.'
    );

    if ($datastore['status_id'] === 1) {
      return redirect()->route('roadmaps.draft');
    }

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
    $paths = Path::select('id', 'name')
      ->orderby('sp', 'asc')
      ->get();

    $statuses = Status::select('id', 'name')
      ->orderby('ss', 'asc')
      ->get();

    return view('backend.programming.roadmaps.edit', [
      'title' => 'Edit data roadmap',
      'roadmap' => $roadmap,
      'paths' => $paths,
      'statuses' => $statuses
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(RoadmapUr $request, Roadmap $roadmap)
  {
    $dataupdate = $request->validated();

    if (
      $request->name != $roadmap->name ||
      $request->slug != $roadmap->slug
    ) {
      $rules = [
        'name' => 'unique:roadmaps,name,' . $roadmap->id,
        'slug' => 'unique:roadmaps,slug,' . $roadmap->id,
      ];

      $messages = [
        'name.unique' => 'Roadmap..name! sudah terdaptar',
        'slug.unique' => 'Roadmap..slug! sudah terdaptar',
      ];

      $request->validate($rules, $messages);
    }

    if ($request->hasFile('image')) {
      if (!empty($roadmap->image)) {
        Storage::delete($roadmap->image);
      }

      $dataupdate['image'] = $request->file('image')->store(
        '/programming/roadmaps'
      );
    }

    if (isset($dataupdate['status_id'])) {
      $roadmap->status_id = $dataupdate['status_id'];
    }

    $roadmap->update($dataupdate);

    Alert::success(
      'success',
      'Data roadmap! berhasil di update.'
    );

    if ($dataupdate['status_id'] === 1) {
      return redirect()->route('roadmaps.draft');
    }

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

  /**
   * Generate resource slug otomatis.
   */
  public function slug(Request $request)
  {
    $slug = SlugService::createSlug(
      Roadmap::class,
      'slug',
      $request->name
    );

    return response()->json(['slug' => $slug]);
  }

  /**
   * Display a listing of the resource.
   */
  public function draft()
  {
    $roadmaps = Roadmap::draft(request(['search', 'path']))
      ->select(['id', 'path_id', 'sr', 'image', 'name', 'status_id', 'url'])
      ->with(['path', 'playlists', 'status'])
      ->orderby('path_id', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.programming.roadmaps.draft', [
      'title' => 'Semua data draft roadmaps',
      'roadmaps' => $roadmaps
    ]);
  }
}
