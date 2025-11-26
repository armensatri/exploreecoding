<?php

namespace App\Http\Controllers\Backend\Manageaccess;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Manageuser\{
  Role,
  Permission
};

use Illuminate\Support\Facades\{
  DB,
  Cache
};

class RoleAccessPermissionController extends Controller
{
  public function accessPermission($url)
  {
    $cacheKey = 'roleaccesspermission.accessPermission.' . $url . '.' . md5(
      json_encode(
        request()->all()
      )
    );

    [$role, $groupper] = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      function () use ($url) {
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

        return [$role, $groupper];
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
