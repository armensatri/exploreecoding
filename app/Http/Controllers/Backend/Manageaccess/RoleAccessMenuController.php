<?php

namespace App\Http\Controllers\Backend\Manageaccess;

use Illuminate\Http\Request;
use App\Models\Managemenu\Menu;
use App\Models\Manageuser\Role;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\{
  DB,
  Cache
};

class RoleAccessMenuController extends Controller
{
  public function accessMenu(string $url)
  {
    $role = Cache::remember(
      "role.show.{$url}",
      now()->addMinutes(10),
      function () use ($url) {
        return Role::where('url', $url)->firstOrFail();
      }
    );

    $menus = Menu::query()
      ->select([
        'id',
        'sm',
        'name',
        'url'
      ])
      ->withExists([
        'roles as has_access' => function ($query) use ($role) {
          $query->where('role_id', $role->id);
        }
      ])
      ->orderBy('sm', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.manageaccess.menu.index', [
      'title' => 'Access Menu',
      'role'  => $role,
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
        $role->menus()->toggle($data['menu_id']);

        if (method_exists(Menu::class, 'bumpCacheVersion')) {
          Menu::bumpCacheVersion();
        }

        return response()->json([
          'success' => true,
          'message' => 'Access menu berhasil diupdate.',
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
