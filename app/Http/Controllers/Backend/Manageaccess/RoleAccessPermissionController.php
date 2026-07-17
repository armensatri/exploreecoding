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
  Log,
  Auth
};

class RoleAccessPermissionController extends Controller
{
  public function accessPermission(string $slug)
  {
    $role = Role::query()
      ->select([
        'id',
        'name',
        'slug',
        'description'
      ])
      ->with(['permissions:id,name'])
      ->where('slug', $slug)
      ->firstOrFail();

    $allPermissions = Permission::query()
      ->select([
        'id',
        'name'
      ])
      ->orderBy('id', 'asc')
      ->get();

    $groupper = $allPermissions->groupBy(
      function ($permission) {
        $parts = explode('.', $permission->name);
        return ucfirst($parts[0]);
      }
    );

    $rolePermissions = $role->permissions
      ->pluck('id')
      ->toArray();

    return view('backend.manageaccess.permission.index', [
      'title' => 'Access Permission',
      'role' => $role,
      'groupper' => $groupper,
      'rolePermissions' => $rolePermissions,
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
        $result = $role->permissions()->toggle($data['permission_id']);
        $isAttached = !empty($result['attached']);

        return response()->json([
          'success' => true,
          'message' => $isAttached
            ? 'Akses permission berhasil ditambahkan.'
            : 'Akses permission berhasil dihapus.',
        ]);
      });
    } catch (\Throwable $e) {
      Log::error('Gagal up permission: ' . $e->getMessage(), [
        'user_id' => Auth::id(),
        'payload' => $data,
        'trace' => $e->getTraceAsString()
      ]);

      return response()->json([
        'success' => false,
        'message' => 'Gagal memperbarui akses.',
      ], 500);
    }
  }
}
