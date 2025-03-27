<?php

namespace App\Http\Controllers\Backend\Programming;

use App\Helpers\RandomUrl;
use App\Http\Controllers\Controller;
use App\Http\Requests\Programming\Playlist\PlaylistSr;
use App\Http\Requests\Programming\Playlist\PlaylistUr;
use App\Models\Programming\Playlist;
use App\Models\Programming\Roadmap;
use App\Models\Published\Status;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PlaylistsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $playlists = Playlist::search(request(['search', 'roadmap', 'status']))
      ->select(['id', 'roadmap_id', 'spl', 'image', 'name', 'status_id', 'url'])
      ->with(['roadmap', 'posts', 'status'])
      ->orderby('roadmap_id', 'asc')
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
    $roadmaps = Roadmap::select('id', 'name')
      ->orderby('sr', 'asc')
      ->get();

    $statuses = Status::select('id', 'name')
      ->orderby('ss', 'asc')
      ->get();

    return view('backend.programming.playlists.create', [
      'title' => 'Create data playlist',
      'playlist' => $playlist,
      'roadmaps' => $roadmaps,
      'statuses' => $statuses
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(PlaylistSr $request)
  {
    $datastore = $request->validated();

    $datastore['url'] = $request->input('url')
      ?: RandomUrl::GenerateUrl();

    if ($request->hasFile('image')) {
      $datastore['image'] = $request->file('image')->store(
        '/programming/playlists'
      );
    }

    $dataupdate['status_id'] = $request->status_id;

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
    $roadmaps = Roadmap::select('id', 'name')
      ->orderby('sr', 'asc')
      ->get();

    $statuses = Status::select('id', 'name')
      ->orderby('ss', 'asc')
      ->get();

    return view('backend.programming.playlists.edit', [
      'title' => 'Edit data playlist',
      'playlist' => $playlist,
      'roadmaps' => $roadmaps,
      'statuses' => $statuses
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(PlaylistUr $request, Playlist $playlist)
  {
    $dataupdate = $request->validated();

    if (
      $request->name != $playlist->name ||
      $request->slug != $playlist->slug
    ) {
      $rules = [
        'name' => 'unique:playlists,name,' . $playlist->id,
        'slug' => 'unique:playlists,slug,' . $playlist->id,
      ];

      $messages = [
        'name.unique' => 'Playlist..name! sudah terdaptar',
        'slug.unique' => 'Playlist..slug! sudah terdaptar',
      ];

      $request->validate($rules, $messages);
    }

    if ($request->hasFile('image')) {
      if (!empty($playlist->image)) {
        Storage::delete($playlist->image);
      }

      $dataupdate['image'] = $request->file('image')->store(
        '/programming/playlists'
      );
    }

    if (isset($dataupdate['status_id'])) {
      $playlist->status_id = $dataupdate['status_id'];
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

  /**
   * Generate resource slug otomatis.
   */
  public function slug(Request $request)
  {
    $slug = SlugService::createSlug(
      Playlist::class,
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
    $playlists = Playlist::draft(request(['search', 'roadmap']))
      ->select(['id', 'roadmap_id', 'spl', 'image', 'name', 'status_id', 'url'])
      ->with(['roadmap', 'posts', 'status'])
      ->orderby('roadmap_id', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.programming.playlists.draft', [
      'title' => 'Semua data draft playlists',
      'playlists' => $playlists
    ]);
  }
}
