<?php

namespace App\Http\Controllers\Backend\Managemenu;

use App\Helpers\RandomUrl;
use Illuminate\Http\Request;
use App\Models\Managemenu\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use RealRashid\SweetAlert\Facades\Alert;
use App\Traits\Controllers\ValidationUnique;
use Cviebrock\EloquentSluggable\Services\SlugService;

use App\Http\Requests\Managemenu\Menu\{
  MenuSr,
  MenuUr,
};

class MenusController extends Controller
{
  use ValidationUnique;

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $cacheKey = 'menus.index.' . md5(
      json_encode(
        request()->all()
      )
    );

    $menus = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      function () {
        return Menu::query()
          ->search(request(['search']))
          ->select([
            'id',
            'sm',
            'name',
            'description',
            'url'
          ])
          ->orderBy('sm', 'asc')
          ->paginate(10)
          ->withQueryString();
      }
    );

    return view('backend.managemenu.menus.index', [
      'title' => 'Semua data menus',
      'menus' => $menus
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('backend.managemenu.menus.create', [
      'title' => 'Create data menu'
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(MenuSr $request)
  {
    $datastore = $request->validated();

    $datastore['url'] = RandomUrl::generateUrl();

    Menu::create($datastore);

    Alert::success(
      'success',
      'Data menu! berhasil di tambahkan.'
    );

    return redirect()->route('menus.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Menu $menu)
  {
    $cacheKey = 'menus.show.' . $menu->id;

    $menuData = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      fn() => $menu
    );

    return view('backend.managemenu.menus.show', [
      'title' => 'Detail data menu',
      'menu' => $menuData
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Menu $menu)
  {
    return view('backend.managemenu.menus.edit', [
      'title' => 'Edit data menu',
      'menu' => $menu
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(MenuUr $request, Menu $menu)
  {
    $dataupdate = $request->validated();

    $this->fieldUnique(
      $request,
      $menu,
      ['name', 'slug'],
      [
        'name.unique' => 'Menu..name! sudah terdaptar',
        'slug.unique'    => 'Menu..slug! sudah terdaptar',
      ]
    );

    $menu->update($dataupdate);

    Alert::success(
      'success',
      'Data menu! berhasil di update.'
    );

    return redirect()->route('menus.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Menu $menu)
  {
    if (in_array($menu->name, [
      'owner',
      'superadmin',
      'creator',
      'member',
      'account',
      'managedata',
      'manageuser',
      'managemenu'
    ])) {
      Alert::warning(
        'Oops...',
        'Data menu! tidak bisa di delete.'
      );

      return redirect()->route('menus.index');
    }

    Menu::destroy($menu->id);

    Alert::success(
      'success',
      'Data menu! berhasil di delete.'
    );

    return redirect()->route('menus.index');
  }

  /**
   * Generate resource slug otomatis.
   */
  public function slug(Request $request)
  {
    $slug = SlugService::createSlug(
      Menu::class,
      'slug',
      $request->name
    );

    return response()->json(['slug' => $slug]);
  }
}
