<?php

namespace App\Http\Controllers\Backend\Manageaccess;

use Illuminate\Http\Request;
use App\Models\Manageuser\Role;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Manageuser\Permission;

class RoleAccessPermissionController extends Controller
{
  public function accessPermission($url)
  {
    $role = Role::query()->where('url', $url)
      ->firstOrFail();

    $permissions = Permission::query()
      ->select(['id', 'name'])
      ->orderBy('id', 'asc')
      ->get();

    $groupper = $permissions->sortBy('id')->groupBy(
      function ($permission) {
        $controller = explode('.', $permission->name)[0];
        return ucfirst($controller);
      }
    );

    return view('backend.manageaccess.permission.index', [
      'title' => 'Access permission',
      'role' => $role,
      'groupper' => $groupper
    ]);
  }

  public function accessUpPermission(Request $request)
  {
    $roleId = $request->role_id;
    $permissionId = $request->permission_id;

    $data = [
      'role_id' => $roleId,
      'permission_id' => $permissionId
    ];

    $exists = DB::table('role_has_permission')
      ->where($data)
      ->exists();

    $exists
      ? DB::table('role_has_permission')->where($data)->delete()
      : DB::table('role_has_permission')->insert($data);

    $message = $exists
      ? 'Permission access! berhasil di delete.'
      : 'Permission access! berhasil di tambahkan.';

    return response()->json([
      'success' => true,
      'message' => $message
    ]);
  }
}
