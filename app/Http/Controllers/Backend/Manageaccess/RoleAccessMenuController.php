<?php

namespace App\Http\Controllers\Backend\Manageaccess;

use Illuminate\Http\Request;
use App\Models\Manageuser\Role;
use App\Models\Managemenu\Menu;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RoleAccessMenuController extends Controller
{
  public function accessMenu(string $slug)
  {
    $role = Role::query()
      ->select([
        'id',
        'name',
        'slug',
      ])
      ->where('slug', $slug)
      ->firstOrFail();

    $menus = Menu::query()
      ->select([
        'id',
        'sm',
        'name',
        'slug'
      ])
      ->withExists([
        'roles as has_access' => fn($query)
        => $query->whereKey($role->id)
      ])
      ->orderBy('sm', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.manageaccess.menu.index', [
      'title' => 'Access Menu',
      'role' => $role,
      'menus' => $menus,
    ]);
  }

  public function accessUpMenu(Request $request)
  {
    $data = $request->validate([
      'role_id' => ['required', 'exists:roles,id'],
      'menu_id' => ['required', 'exists:menus,id'],
    ]);

    try {
      return DB::transaction(function () use ($data) {
        $role = Role::findOrFail($data['role_id']);
        $result = $role->menus()->toggle($data['menu_id']);
        $isAttached = !empty($result['attached']);

        if (method_exists(Menu::class, 'bumpCacheVersion')) {
          Menu::bumpCacheVersion();
        }

        return response()->json([
          'success' => true,
          'message' => $isAttached
            ? 'Access menu berhasil ditambahkan.'
            : 'Access menu berhasil dihapus.',
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
