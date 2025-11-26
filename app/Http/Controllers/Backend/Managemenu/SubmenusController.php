<?php

namespace App\Http\Controllers\Backend\Managemenu;

use App\Helpers\RandomUrl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use RealRashid\SweetAlert\Facades\Alert;
use App\Traits\Controllers\ValidationUnique;
use Cviebrock\EloquentSluggable\Services\SlugService;

use App\Models\Managemenu\{
  Menu,
  Submenu,
};

use App\Http\Requests\Managemenu\Submenu\{
  SubmenuSr,
  SubmenuUr,
};

class SubmenusController extends Controller
{
  use ValidationUnique;

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $cacheKey = 'submenus.index.' . md5(json_encode(request()->all()));

    $submenus = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      function () {
        return Submenu::query()
          ->search(request(['search', 'menu']))
          ->select([
            'id',
            'menu_id',
            'ssm',
            'name',
            'description',
            'url'
          ])
          ->with(['menu:id,name'])
          ->orderBy('menu_id', 'asc')
          ->paginate(10)
          ->withQueryString();
      }
    );

    return view('backend.managemenu.submenus.index', [
      'title' => 'Semua data submenus',
      'submenus' => $submenus
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $menus = Menu::query()->select('id', 'name')
      ->orderBy('sm', 'asc')
      ->get();

    return view('backend.managemenu.submenus.create', [
      'title' => 'Create data submenu',
      'menus' => $menus
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(SubmenuSr $request)
  {
    $datastore = $request->validated();

    $datastore['url'] = RandomUrl::generateUrl();

    Submenu::create($datastore);

    Alert::success(
      'success',
      'Data submenu! berhasil di tambahkan.'
    );

    return redirect()->route('submenus.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Submenu $submenu)
  {
    $cacheKey = 'submenus.show.' . $submenu->id;

    $submenuData = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      fn() => $submenu
    );

    return view('backend.managemenu.submenus.show', [
      'title' => 'Detail data submenu',
      'submenu' => $submenuData
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Submenu $submenu)
  {
    $menus = Menu::query()->select('id', 'name')
      ->orderBy('sm', 'asc')
      ->get();

    return view('backend.managemenu.submenus.edit', [
      'title' => 'Edit data submenu',
      'submenu' => $submenu,
      'menus' => $menus
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(SubmenuUr $request, Submenu $submenu)
  {
    $dataupdate = $request->validated();

    $this->fieldUnique(
      $request,
      $submenu,
      ['name', 'slug'],
      [
        'name.unique' => 'Submenu..name! sudah terdaptar',
        'slug.unique' => 'Submenu..slug! sudah terdaptar',
      ]
    );

    $submenu->update($dataupdate);

    Alert::success(
      'success',
      'Data submenu! berhasil di update.'
    );

    return redirect()->route('submenus.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Submenu $submenu)
  {
    if (in_array($submenu->name, ['menus', 'submenus'])) {
      Alert::warning(
        'Oops...',
        'Data submenu! tidak bisa di delete.'
      );

      return redirect()->route('submenus.index');
    }

    Submenu::destroy($submenu->id);

    Alert::success(
      'success',
      'Data submenu! berhasil di delete.'
    );

    return redirect()->route('submenus.index');
  }

  /**
   * Generate resource slug otomatis.
   */
  public function slug(Request $request)
  {
    $slug = SlugService::createSlug(
      Submenu::class,
      'slug',
      $request->name
    );

    return response()->json(['slug' => $slug]);
  }
}
