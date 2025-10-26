<?php

namespace App\Http\Controllers\Backend\Programming;

use Illuminate\Http\Request;
use App\Models\Programming\Roadmap;
use App\Http\Controllers\Controller;

use App\Http\Requests\Programming\Roadmap\{
  RoadmapSr,
  RoadmapUr,
};

class RoadmapsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $roadmaps = Roadmap::query()
      ->select([
        'id',
        'path_id',
        'sr',
        'image',
        'name',
        'status_id',
        'url'
      ])
      ->with(['status:id,name,bg,text', 'path:id,name'])
      ->orderBy('path_id', 'asc')
      ->paginate(15)
      ->withQueryString();

    return view('backend.programming.roadmaps.index', [
      'title' => 'Semua data roadmaps',
      'roadmaps' => $roadmaps
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
  public function store(RoadmapSr $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Roadmap $roadmap)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Roadmap $roadmap)
  {
    //
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
