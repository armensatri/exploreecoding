<?php

namespace App\Http\Controllers\Backend\Programming;

use App\Helpers\RandomUrl;
use App\Models\Published\Status;
use App\Models\Programming\Path;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

use App\Traits\Controller\{
  ImageStore,
  ImageUpdate
};

use Illuminate\Support\Facades\{
  Cache,
  Storage
};

use App\Http\Requests\Programming\Path\{
  PathSr,
  PathUr
};

class PathsController extends Controller
{
  use ImageStore, ImageUpdate;

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $filters = request(['search', 'status']);

    $cacheKey = 'paths.index.ids.'
      . Path::cacheVersion() . '.'
      . md5(json_encode($filters));

    $ids = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      fn() => Path::query()
        ->search($filters)
        ->orderBy('sp', 'asc')
        ->pluck('id')
        ->toArray()
    );

    $paths = Path::query()
      ->whereIn('id', $ids)
      ->select([
        'id',
        'sp',
        'name',
        'status_id',
        'url'
      ])->with(['status:id,name,bg,text'])
      ->orderBy('sp', 'asc')
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
    $statuses = Status::query()->select('id', 'name')
      ->orderBy('id', 'asc')
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

    $datastore['url'] = RandomUrl::generateUrl();

    $datastore['image'] = $this->handleImageStore(
      $request,
      'image',
      'programming/paths'
    );

    $path = Path::create($datastore);

    Alert::html(
      'success',
      "Data path!
        <span style='color:#2563eb;'>
          {$path->name}
        </span> berhasil di tambahkan",
      'success'
    );

    return redirect()->route('paths.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Path $path)
  {
    return view('backend.programming.paths.show', [
      'title' => 'Detail data path',
      'path' => $path
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Path $path)
  {
    $statuses = Status::query()->select('id', 'name')
      ->orderBy('id', 'asc')
      ->get();

    return view('backend.programming.paths.edit', [
      'title' => 'Edit data path',
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

    $dataupdate['image'] = $this->handleImageUpdate(
      $request,
      $path,
      'image',
      'programming/paths'
    );

    $path->update($dataupdate);

    Alert::html(
      'success',
      "Data path!
        <span style='color:#2563eb;'>
          {$path->name}
        </span> berhasil di update",
      'success'
    );

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

    Alert::html(
      'success',
      "Data path!
        <span style='color:#2563eb;'>
          {$path->name}
        </span> berhasil di delete",
      'success'
    );

    return redirect()->route('paths.index');
  }
}
