<?php

namespace App\Http\Controllers\Backend\Managemenu;

use App\Helpers\RandomUrl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Managemenu\Navigation;
use RealRashid\SweetAlert\Facades\Alert;
use App\Traits\Controllers\ValidationUnique;
use Cviebrock\EloquentSluggable\Services\SlugService;

use App\Http\Requests\Managemenu\Navigation\{
  NavigationSr,
  NavigationUr,
};

class NavigationsController extends Controller
{
  use ValidationUnique;

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $navigations = Navigation::query()
      ->search(request(['search']))
      ->select([
        'id',
        'sn',
        'name',
        'routee',
        'button_name',
        'url'
      ])
      ->orderBy('sn', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.managemenu.navigations.index', [
      'title' => 'Semua data navigations',
      'navigations' => $navigations
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('backend.managemenu.navigations.create', [
      'title' => 'Create data navigation'
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(NavigationSr $request)
  {
    $datastore = $request->validated();

    $datastore['url'] = RandomUrl::generateUrl();

    Navigation::create($datastore);

    Alert::success(
      'success',
      'Data navigation! berhasil di tambahkan.'
    );

    return redirect()->route('navigations.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Navigation $navigation)
  {
    return view('backend.managemenu.navigations.show', [
      'title' => 'Detail data navigation',
      'navigation' => $navigation
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Navigation $navigation)
  {
    return view('backend.managemenu.navigations.edit', [
      'title' => 'Edit data navigation',
      'navigation' => $navigation
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(NavigationUr $request, Navigation $navigation)
  {
    $dataupdate = $request->validated();

    $this->fieldUnique(
      $request,
      $navigation,
      ['name', 'slug'],
      [
        'name.unique' => 'Navigation..name! sudah terdaptar',
        'slug.unique' => 'Navigation..slug! sudah terdaptar',
      ]
    );

    $navigation->update($dataupdate);

    Alert::success(
      'success',
      'Data navigation! berhasil di update.'
    );

    return redirect()->route('navigations.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Navigation $navigation)
  {
    Navigation::destroy($navigation->id);

    Alert::success(
      'success',
      'Data navigation! berhasil di delete.'
    );

    return redirect()->route('navigations.index');
  }

  /**
   * Generate resource slug otomatis.
   */
  public function slug(Request $request)
  {
    $slug = SlugService::createSlug(
      Navigation::class,
      'slug',
      $request->name
    );

    return response()->json(['slug' => $slug]);
  }
}
