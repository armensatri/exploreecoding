<?php

namespace App\Http\Controllers\Backend\Programming;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Programming\Playlist;

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
    //
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
}
