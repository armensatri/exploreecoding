<?php

namespace App\Http\Controllers\Backend\Programming;

use App\Helpers\RandomUrl;
use Illuminate\Http\Request;
use App\Models\Published\Status;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Programming\{
  Roadmap,
  Playlist,
};
use Illuminate\Support\Facades\Cache;

use App\Http\Requests\Programming\Playlist\{
  PlaylistSr,
  PlaylistUr,
};

class PlaylistsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $cacheKey = 'playlists.index.' . md5(
      json_encode(
        request(['search', 'roadmap'])
      )
    );

    $playlists = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      function () {
        return Playlist::query()
          ->search(request(['search', 'roadmap']))
          ->select([
            'id',
            'roadmap_id',
            'spl',
            'name',
            'status_id',
            'url'
          ])
          ->with(['status:id,name,bg,text', 'roadmap:id,name'])
          ->orderBy('roadmap_id', 'asc')
          ->paginate(10)
          ->withQueryString();
      }
    );

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

    $datastore['url'] = RandomUrl::generateUrl();

    if ($request->hasFile('image')) {
      $datastore['image'] = $request->file('image')->store(
        '/programming/playlists'
      );
    }

    Playlist::create($datastore);

    Alert::success(
      'success',
      'Data playlist! berhasil di tambahkan.'
    );

    return redirect()->route('playlists.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Playlist $playlist)
  {
    $cacheKey = 'playlists.show.' . $playlist->id;

    $playlistData = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      function () use ($playlist) {
        return $playlist;
      }
    );

    return view('backend.programming.playlists.show', [
      'title' => 'Detail data playlist',
      'playlist' => $playlistData
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

    if ($request->hasFile('image')) {
      if (!empty($playlist->image)) {
        Storage::delete($playlist->image);
      }

      $dataupdate['image'] = $request->file('image')->store(
        '/programming/playlists'
      );
    }

    $playlist->update($dataupdate);

    Alert::success(
      'success',
      'Data playlist! berhasil di update.'
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

    Alert::success(
      'success',
      'Data playlist! berhasil di delete.'
    );

    return redirect()->route('playlists.index');
  }
}
