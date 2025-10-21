<?php

namespace App\Http\Controllers\Backend\Manageuser;

use App\Helpers\RandomUrl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Manageuser\Permission;
use App\Traits\Controllers\ValidationUnique;
use Cviebrock\EloquentSluggable\Services\SlugService;

use App\Http\Requests\Manageuser\Permission\{
  PermissionSr,
  PermissionUr,
};
use RealRashid\SweetAlert\Facades\Alert;

class PermissionsController extends Controller
{
  use ValidationUnique;

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $permissions = Permission::query()
      ->search(request(['search']))
      ->select([
        'id',
        'name',
        'url',
        'guard_name',
      ])
      ->orderBy('id', 'asc')
      ->paginate(15)
      ->withQueryString();

    return view('backend.manageuser.permissions.index', [
      'title' => 'Semua data permissions',
      'permissions' => $permissions
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('backend.manageuser.permissions.create', [
      'title' => 'Create data permission'
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(PermissionSr $request)
  {
    $datastore = $request->validated();

    $datastore['url'] = RandomUrl::generateUrl();

    Permission::create($datastore);

    Alert::success(
      'success',
      'Data permission! berhasil di tambahkan.'
    );

    return redirect()->route('permissions.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Permission $permission)
  {
    return view('backend.manageuser.permissions.show', [
      'title' => 'Detail data permission',
      'permission' => $permission
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Permission $permission)
  {
    return view('backend.manageuser.permissions.edit', [
      'title' => 'Edit data permissions',
      'permission' => $permission
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(PermissionUr $request, Permission $permission)
  {
    $dataupdate = $request->validated();

    $this->fieldUnique(
      $request,
      $permission,
      ['name', 'slug'],
      [
        'name.unique' => 'Permission..name! sudah terdaptar',
        'slug.unique'    => 'Permission..slug! sudah terdaptar',
      ]
    );

    $permission->update($dataupdate);

    Alert::success(
      'success',
      'Data permission! berhasil di update.'
    );

    return redirect()->route('permissions.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Permission $permission)
  {
    Permission::destroy($permission->id);

    Alert::success(
      'success',
      'Data permission! berhasil di delete.'
    );

    return redirect()->route('permissions.index');
  }

  /**
   * Generate resource slug otomatis.
   */
  public function slug(Request $request)
  {
    $slug = SlugService::createSlug(
      Permission::class,
      'slug',
      $request->name
    );

    return response()->json(['slug' => $slug]);
  }
}
