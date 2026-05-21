<?php

namespace App\Http\Controllers\Backend\Manageaccess;

use Illuminate\Http\Request;
use App\Models\Manageuser\Role;
use App\Models\Managemenu\Submenu;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\{
  DB
};

class RoleAccessSubmenuController extends Controller
{
  public function accessSubmenu(string $url)
  {
    $role = Role::query()
      ->select([
        'id',
        'name',
        'url'
      ])
      ->where('url', $url)
      ->firstOrFail();

    $submenus = Submenu::query()
      ->select([
        'id',
        'ssm',
        'name',
        'url'
      ])
      ->withExists([
        'roles as has_access' => fn($query)
        => $query->whereKey($role->id)
      ])
      ->orderBy('id', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.manageaccess.submenu.index', [
      'title'    => 'Access Submenu',
      'role'     => $role,
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

        $result = $role->submenus()->toggle($data['submenu_id']);

        $isAttached = !empty($result['attached']);

        if (method_exists(Submenu::class, 'bumpCacheVersion')) {
          Submenu::bumpCacheVersion();
        }

        return response()->json([
          'success' => true,
          'message' => $isAttached
            ? 'Access submenu berhasil ditambahkan.'
            : 'Access submenu berhasil dihapus.',
        ]);
      });
    } catch (\Throwable $e) {

      return response()->json([
        'success' => false,
        'message' => 'Gagal memperbarui akses.',
      ], 500);
    }
  }
}
