<?php

namespace App\Http\Controllers\Backend\Programming;

use App\Helpers\RandomUrl;
use Illuminate\Http\Request;
use App\Models\Published\Status;
use App\Models\Programming\Path;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

use App\Http\Requests\Programming\Path\{
  PathSr,
  PathUr
};

class PathsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $paths = Path::query()
      ->search(request(['search']))
      ->select([
        'id',
        'sp',
        'image',
        'name',
        'status_id',
        'url'
      ])
      ->with(['status:id,name,bg,text'])
      ->orderBy('sp', 'asc')
      ->paginate(15)
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

    if ($request->hasFile('image')) {
      $datastore['image'] = $request->file('image')->store(
        '/programming/paths'
      );
    }

    Path::create($datastore);

    Alert::success(
      'success',
      'Data path! berhasil di tambahkan.'
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

    if ($request->hasFile('image')) {
      if (!empty($path->image)) {
        Storage::delete($path->image);
      }

      $dataupdate['image'] = $request->file('image')->store(
        '/programming/paths'
      );
    }

    $path->update($dataupdate);

    Alert::success(
      'success',
      'Data path! berhasil di update.'
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

    Alert::success(
      'success',
      'Data path! berhasil di delete.'
    );

    return redirect()->route('paths.index');
  }
}
