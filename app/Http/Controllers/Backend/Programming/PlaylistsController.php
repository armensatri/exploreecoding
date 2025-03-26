<?php

namespace App\Http\Controllers\Backend\Programming;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Programming\Playlist;
use App\Http\Requests\Programming\Playlist\PlaylistSr;
use App\Http\Requests\Programming\Playlist\PlaylistUr;

class PlaylistsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $playlists = Playlist::search(request(['search', 'roadmap', 'status']))
      ->select(['id', 'roadmap_id', 'spl', 'image', 'name', 'status_id', 'url'])
      ->orderby('sr', 'asc')
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
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(PlaylistSr $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Playlist $playlist)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Playlist $playlist)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(PlaylistUr $request, Playlist $playlist)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Playlist $playlist)
  {
    //
  }

  /**
   * Display a listing of the resource.
   */
  public function draft()
  {
    $playlists = Playlist::draft(request(['search', 'roadmap', 'status']))
      ->select(['id', 'roadmap_id', 'spl', 'image', 'name', 'status_id', 'url'])
      ->orderby('sr', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.programming.playlists.draft', [
      'title' => 'Semua data draft playlists',
      'playlists' => $playlists
    ]);
  }
}
