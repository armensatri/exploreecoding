<?php

namespace App\Http\Controllers\Backend\Programming;

use App\Models\Published\Status;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

use App\Traits\Controller\{
  ImageStore,
  ImageUpdate
};

use App\Models\Programming\{
  Roadmap,
  Playlist
};

use Illuminate\Support\Facades\{
  Cache,
  Storage
};

use App\Http\Requests\Programming\Playlist\{
  PlaylistSr,
  PlaylistUr,
};

class PlaylistsController extends Controller
{
  use ImageStore, ImageUpdate;

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $filters = request(['search', 'roadmap', 'status']);

    $cacheKey = 'playlists.index.ids.'
      . Playlist::cacheVersion() . '.'
      . md5(json_encode($filters));

    $ids = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      fn() => Playlist::query()
        ->search($filters)
        ->orderBy('roadmap_id', 'asc')
        ->pluck('id')
        ->toArray()
    );

    $playlists = Playlist::query()
      ->whereIn('id', $ids)
      ->select([
        'id',
        'roadmap_id',
        'spl',
        'name',
        'slug',
        'status_id',
      ])
      ->with([
        'roadmap:id,name',
        'status:id,name,bg,text'
      ])
      ->orderBy('roadmap_id', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.programming.playlists.index', [
      'title' => 'Semua data playlists',
      'playlists' => $playlists
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Playlist $playlist)
  {
    $statuses = Status::query()->select('id', 'name')
      ->orderBy('id', 'asc')
      ->get();

    $roadmaps = Roadmap::query()->select('id', 'name')
      ->orderBy('id', 'asc')
      ->get();

    return view('backend.programming.playlists.create', [
      'title' => 'Create data playlist',
      'playlist' => $playlist,
      'statuses' => $statuses,
      'roadmaps' => $roadmaps
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(PlaylistSr $request)
  {
    $datastore = $request->validated();

    $datastore['image'] = $this->handleImageStore(
      $request,
      'image',
      'programming/playlists'
    );

    $playlist = Playlist::create($datastore);

    Alert::html(
      'success',
      "Data playlist!
        <span style='color:#2563eb;'>
          {$playlist->name}
        </span> berhasil di tambahkan",
      'success'
    );

    return redirect()->route('playlists.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Playlist $playlist)
  {
    return view('backend.programming.playlists.show', [
      'title' => 'Detail data playlist',
      'playlist' => $playlist
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Playlist $playlist)
  {
    $statuses = Status::query()->select('id', 'name')
      ->orderBy('id', 'asc')
      ->get();

    $roadmaps = Roadmap::query()->select('id', 'name')
      ->orderBy('id', 'asc')
      ->get();

    return view('backend.programming.playlists.edit', [
      'title' => 'Edit data playlist',
      'playlist' => $playlist,
      'statuses' => $statuses,
      'roadmaps' => $roadmaps
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(PlaylistUr $request, Playlist $playlist)
  {
    $dataupdate = $request->validated();

    $dataupdate['image'] = $this->handleImageUpdate(
      $request,
      $playlist,
      'image',
      'programming/playlists'
    );

    $playlist->update($dataupdate);

    Alert::html(
      'success',
      "Data playlist!
        <span style='color:#2563eb;'>
          {$playlist->name}
        </span> berhasil di update",
      'success'
    );

    return redirect()->route('playlists.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Playlist $playlist)
  {
    if ($playlist->image) {
      Storage::delete($playlist->image);
    }

    Playlist::destroy($playlist->id);

    Alert::html(
      'success',
      "Data playlist!
        <span style='color:#2563eb;'>
          {$playlist->name}
        </span> berhasil di delete",
      'success'
    );

    return redirect()->route('playlists.index');
  }
}
