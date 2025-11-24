<?php

namespace App\Http\Controllers\Backend\Manageuser;

use App\Helpers\RandomUrl;
use Illuminate\Http\Request;
use App\Models\Manageuser\Role;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Traits\Controllers\ValidationUnique;
use Cviebrock\EloquentSluggable\Services\SlugService;

use App\Http\Requests\Manageuser\Role\{
  RoleSr,
  RoleUr,
};

class RolesController extends Controller
{
  use ValidationUnique;

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $roles = Role::query()
      ->search(request(['search']))
      ->select([
        'id',
        'sr',
        'name',
        'bg',
        'text',
        'guard_name',
        'description',
        'url',
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

    $datastore['url'] = RandomUrl::generateUrl();

    Role::create($datastore);

    Alert::success(
      'success',
      'Data role! berhasil di tambahkan.'
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
        'slug.unique'    => 'Role..slug! sudah terdaptar',
      ]
    );

    $role->update($dataupdate);

    Alert::success(
      'success',
      'Data role! berhasil di update.'
    );

    return redirect()->route('roles.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Role $role)
  {
    if (in_array($role->name, ['owner', 'superadmin'])) {
      Alert::warning(
        'Oops...',
        'Data role! tidak bisa di delete.'
      );

      return redirect()->route('roles.index');
    }

    Role::destroy($role->id);

    Alert::success(
      'success',
      'Data role! berhasil di delete.'
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
