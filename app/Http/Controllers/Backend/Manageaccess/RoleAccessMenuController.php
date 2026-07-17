<?php

namespace App\Http\Controllers\Backend\Manageaccess;

use Illuminate\Http\Request;
use App\Models\Manageuser\Role;
use App\Models\Managemenu\Menu;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\{
  DB,
  Log,
  Auth
};

class RoleAccessMenuController extends Controller
{
  public function accessMenu(string $slug)
  {
    $role = Role::query()
      ->select([
        'id',
        'name',
        'slug',
        'description'
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
      Log::error('Gagal memperbarui akses menu: ' . $e->getMessage(), [
        'user_id' => Auth::id(),
        'payload' => $data,
        'trace' => $e->getTraceAsString()
      ]);

      return response()->json([
        'success' => false,
        'message' => 'Gagal memperbarui akses karena masalah sistem.',
      ], 500);
    }
  }
}
