<?php

namespace App\Http\Controllers\Backend\Programming;

use App\Helpers\RandomUrl;
use Illuminate\Http\Request;
use App\Models\Programming\Path;
use App\Models\Published\Status;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Programming\Path\PathSr;
use App\Http\Requests\Programming\Path\PathUr;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PathsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $paths = Path::search(request(['search', 'status']))
      ->select(['id', 'sp', 'image', 'name', 'status_id', 'url'])
      ->with(['roadmaps', 'status'])
      ->orderby('sp', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.programming.paths.index', [
      'title' => 'Semua data paths',
      'paths' => $paths
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Path $path)
  {
    $statuses = Status::select('id', 'name')
      ->orderby('ss', 'asc')
      ->get();

    return view('backend.programming.paths.create', [
      'title' => 'Create data path',
      'path' => $path,
      'statuses' => $statuses
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(PathSr $request)
  {
    $datastore = $request->validated();

    $datastore['url'] = $request->input('url')
      ?: RandomUrl::GenerateUrl();

    if ($request->hasFile('image')) {
      $datastore['image'] = $request->file('image')->store(
        '/programming/paths'
      );
    }

    $datastore['status_id'] = $request->status_id;

    Path::create($datastore);

    Alert::success(
      'success',
      'Data path! berhasil di tambahkan.'
    );

    if ($datastore['status_id'] === 1) {
      return redirect()->route('paths.draft');
    }

    return redirect()->route('paths.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Path $path)
  {
    return view('backend.programming.paths.show', [
      'title' => 'Detail data paths',
      'path' => $path
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Path $path)
  {
    $statuses = Status::select('id', 'name')
      ->orderby('ss', 'asc')
      ->get();

    return view('backend.programming.paths.edit', [
      'title' => 'Edit data status',
      'path' => $path,
      'statuses' => $statuses
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(PathUr $request, Path $path)
  {
    $dataupdate = $request->validated();

    if (
      $request->name != $path->name ||
      $request->slug != $path->slug
    ) {
      $rules = [
        'name' => 'unique:paths,name,' . $path->id,
        'slug' => 'unique:paths,slug,' . $path->id,
      ];

      $messages = [
        'name.unique' => 'Path..name! sudah terdaptar',
        'slug.unique' => 'Path..slug! sudah terdaptar',
      ];

      $request->validate($rules, $messages);
    }

    if ($request->hasFile('image')) {
      if (!empty($path->image)) {
        Storage::delete($path->image);
      }

      $dataupdate['image'] = $request->file('image')->store(
        '/programming/paths'
      );
    }

    if (isset($dataupdate['status_id'])) {
      $path->status_id = $dataupdate['status_id'];
    }

    $path->update($dataupdate);

    Alert::success(
      'success',
      'Data path! berhasil di update.'
    );

    if ($dataupdate['status_id'] === 1) {
      return redirect()->route('paths.draft');
    }

    return redirect()->route('paths.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Path $path)
  {
    if ($path->image) {
      Storage::delete($path->image);
    }

    Path::destroy($path->id);

    Alert::success(
      'success',
      'Data path! berhasil di delete.'
    );

    return redirect()->route('paths.index');
  }

  /**
   * Generate resource slug otomatis.
   */
  public function slug(Request $request)
  {
    $slug = SlugService::createSlug(
      Path::class,
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
    $paths = Path::draft(request(['search']))
      ->select(['id', 'sp', 'image', 'name', 'status_id', 'url'])
      ->with(['roadmaps', 'status'])
      ->orderby('sp', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.programming.paths.draft', [
      'title' => 'Semua data draft paths',
      'paths' => $paths
    ]);
  }
}
