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
  public function accessPermission(string $url)
  {
    $role = Cache::remember(
      "role.show.{$url}",
      now()->addMinutes(10),
      function () use ($url) {
        return Role::where('url', $url)->firstOrFail();
      }
    );

    $version = method_exists(
      Permission::class,
      'cacheVersion'
    ) ? Permission::cacheVersion() : 'v1';

    $groupper = Cache::remember(
      "roleaccess.perm.list.{$version}",
      now()->addMinutes(10),
      function () {
        return Permission::query()
          ->select([
            'id',
            'name'
          ])
          ->orderBy('id', 'asc')
          ->get()
          ->groupBy(fn($p) => ucfirst(explode('.', $p->name)[0]));
      }
    );

    $rolePermissions = $role->permissions()
      ->pluck('permissions.id')
      ->toArray();

    return view('backend.manageaccess.permission.index', [
      'title' => 'Access Permission',
      'role' => $role,
      'groupper' => $groupper,
      'rolePermissions' => $rolePermissions
    ]);
  }

  public function accessUpPermission(Request $request)
  {
    $data = $request->validate([
      'role_id' => ['required', 'exists:roles,id'],
      'permission_id' => ['required', 'exists:permissions,id'],
    ]);

    try {
      return DB::transaction(function () use ($data) {
        $role = Role::findOrFail($data['role_id']);
        $role->permissions()->toggle($data['permission_id']);

        if (method_exists(Permission::class, 'bumpCacheVersion')) {
          Permission::bumpCacheVersion();
        }

        return response()->json([
          'success' => true,
          'message' => 'Akses permission berhasil diupdate.'
        ]);
      });
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Terjadi kesalahan sistem.',
      ], 500);
    }
  }
}
