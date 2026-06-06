<?php

namespace App\Http\Controllers\Backend\Manageuser;

use Illuminate\Http\Request;
use App\Models\Manageuser\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use RealRashid\SweetAlert\Facades\Alert;
use App\Traits\Controller\ValidationUnique;
use Cviebrock\EloquentSluggable\Services\SlugService;


use App\Http\Requests\Manageuser\Role\{
  RoleSr,
  RoleUr
};

class RolesController extends Controller
{
  use ValidationUnique;

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $filters = request(['search']);

    $cacheKey = 'roles.index.ids.'
      . Role::cacheVersion() . '.'
      . md5(json_encode($filters));

    $ids = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      fn() => Role::query()
        ->search($filters)
        ->orderBy('sr', 'asc')
        ->pluck('id')
        ->toArray()
    );

    $roles = Role::query()
      ->whereIn('id', $ids)
      ->select([
        'id',
        'sr',
        'name',
        'slug',
        'bg',
        'text',
        'description',
      ])
      ->orderBy('sr', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.manageuser.roles.index', [
      'title' => 'Semua data roles',
      'roles' => $roles
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('backend.manageuser.roles.create', [
      'title' => 'Create data role'
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(RoleSr $request)
  {
    $datastore = $request->validated();

    $role = Role::create($datastore);

    Alert::html(
      'success',
      "Data role!
        <span style='color:#2563eb;'>
          {$role->name}
        </span> berhasil di tambahkan",
      'success'
    );

    return redirect()->route('roles.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Role $role)
  {
    return view('backend.manageuser.roles.show', [
      'title' => 'Detail data role',
      'role' => $role
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Role $role)
  {
    return view('backend.manageuser.roles.edit', [
      'title' => 'Edit data role',
      'role' => $role
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(RoleUr $request, Role $role)
  {
    $dataupdate = $request->validated();

    $this->fieldUnique(
      $request,
      $role,
      ['name', 'slug'],
      [
        'name.unique' => 'Role..name! sudah terdaptar',
        'slug.unique' => 'Role..slug! sudah terdaptar',
      ]
    );

    $role->update($dataupdate);

    Alert::html(
      'success',
      "Data role!
        <span style='color:#2563eb;'>
          {$role->name}
        </span> berhasil di update",
      'success'
    );

    return redirect()->route('roles.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Role $role)
  {
    if (in_array($role->name, ['owner', 'superadmin'])) {
      Alert::html(
        'Oops...',
        "Data role!
        <span style='color:#2563eb;'>
          {$role->name}
        </span> tidak boleh di delete",
        'warning'
      );

      return redirect()->route('roles.index');
    }

    Role::destroy($role->id);

    Alert::html(
      'success',
      "Data role!
        <span style='color:#2563eb;'>
          {$role->name}
        </span> berhasil di delete",
      'success'
    );

    return redirect()->route('roles.index');
  }

  /**
   * Generate resource slug otomatis.
   */
  public function slug(Request $request)
  {
    $slug = SlugService::createSlug(
      Role::class,
      'slug',
      $request->name
    );

    return response()->json(['slug' => $slug]);
  }
}
