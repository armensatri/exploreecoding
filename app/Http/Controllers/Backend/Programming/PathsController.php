<?php

namespace App\Http\Controllers\Backend\Programming;

use Illuminate\Http\Request;
use App\Models\Programming\Path;
use App\Http\Controllers\Controller;

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
  public function store(PathSr $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Path $path)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Path $path)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(PathUr $request, Path $path)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Path $path)
  {
    //
  }
}
