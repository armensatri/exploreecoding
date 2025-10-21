<?php

namespace App\Http\Controllers\Backend\Managemenu;

use App\Helpers\RandomUrl;
use Illuminate\Http\Request;
use App\Models\Managemenu\Explore;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Traits\Controllers\ValidationUnique;
use Cviebrock\EloquentSluggable\Services\SlugService;

use App\Http\Requests\Managemenu\Explore\{
  ExploreSr,
  ExploreUr,
};

class ExploresController extends Controller
{
  use ValidationUnique;

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $explores = Explore::query()
      ->select(request(['search']))
      ->select([
        'id',
        'se',
        'name',
        'routee',
        'button_name',
        'url'
      ])
      ->orderBy('se', 'asc')
      ->paginate(15)
      ->withQueryString();

    return view('backend.managemenu.explores.index', [
      'title' => 'Semua data explores',
      'explores' => $explores
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('backend.managemenu.explores.create', [
      'title' => 'Create data explore'
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(ExploreSr $request)
  {
    $datastore = $request->validated();

    $datastore['url'] = RandomUrl::generateUrl();

    Explore::create($datastore);

    Alert::success(
      'success',
      'Data explore! berhasil di tambahkan.'
    );

    return redirect()->route('explores.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Explore $explore)
  {
    return view('backend.managemenu.explores.show', [
      'title' => 'Detail data explore',
      'explore' => $explore
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Explore $explore)
  {
    return view('backend.managemenu.explores.edit', [
      'title' => 'Edit data explore',
      'explore' => $explore
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(ExploreUr $request, Explore $explore)
  {
    $dataupdate = $request->validated();

    $this->fieldUnique(
      $request,
      $explore,
      ['name', 'slug'],
      [
        'name.unique' => 'Explore..name! sudah terdaptar',
        'slug.unique' => 'Explore..slug! sudah terdaptar',
      ]
    );

    $explore->update($dataupdate);

    Alert::success(
      'success',
      'Data explore! berhasil di update.'
    );

    return redirect()->route('explores.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Explore $explore)
  {
    Explore::destroy($explore->id);

    Alert::success(
      'success',
      'Data explore! berhasil di delete.'
    );

    return redirect()->route('explores.index');
  }

  /**
   * Generate resource slug otomatis.
   */
  public function slug(Request $request)
  {
    $slug = SlugService::createSlug(
      Explore::class,
      'slug',
      $request->name
    );

    return response()->json(['slug' => $slug]);
  }
}
