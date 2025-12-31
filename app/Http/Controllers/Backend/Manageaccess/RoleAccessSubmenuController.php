<?php

namespace App\Http\Controllers\Backend\Manageaccess;

use Illuminate\Http\Request;
use App\Models\Manageuser\Role;
use App\Models\Managemenu\Submenu;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\{
  DB,
  Cache
};

class RoleAccessSubmenuController extends Controller
{
  public function accessSubmenu(string $url)
  {
    $role = Cache::remember(
      "role.show.{$url}",
      now()->addMinutes(10),
      function () use ($url) {
        return Role::where('url', $url)->firstOrFail();
      }
    );

    $submenus = Submenu::query()
      ->select([
        'id',
        'ssm',
        'name',
        'url'
      ])
      ->withExists([
        'roles as has_access' => function ($query) use ($role) {
          $query->where('role_id', $role->id);
        }
      ])
      ->orderBy('id', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.manageaccess.submenu.index', [
      'title' => 'Access Submenu',
      'role' => $role,
      'submenus' => $submenus,
    ]);
  }

  public function accessUpSubmenu(Request $request)
  {
    $data = $request->validate([
      'role_id'    => ['required', 'exists:roles,id'],
      'submenu_id' => ['required', 'exists:submenus,id'],
    ]);

    try {
      return DB::transaction(function () use ($data) {
        $role = Role::findOrFail($data['role_id']);
        $role->submenus()->toggle($data['submenu_id']);

        if (method_exists(Submenu::class, 'bumpCacheVersion')) {
          Submenu::bumpCacheVersion();
        }

        return response()->json([
          'success' => true,
          'message' => 'Access submenu berhasil diupdate.',
        ]);
      });
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Gagal memperbarui akses.',
      ], 500);
    }
  }
}
