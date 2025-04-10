<?php

namespace App\Http\Controllers\Backend\Access;

use Illuminate\Http\Request;
use App\Models\Managemenu\Menu;
use App\Models\Manageuser\Role;
use App\Models\Managemenu\Submenu;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Manageuser\Permission;
use Illuminate\Support\Facades\Cache;

class AccessController extends Controller
{
  public function amenu($id)
  {
    $cacheKey = "access_role_menus_{$id}";

    $role = Cache::remember($cacheKey, 5 * 60, function () use ($id) {
      return Role::with(['menus' => function ($query) {
        $query->select('menus.id');
      }])->findOrFail($id);
    });

    $assignedMenuIds = $role->menus->pluck('id')->toArray();

    $menus = Menu::select('id', 'sm', 'name')
      ->orderBy('sm', 'asc')
      ->paginate(10);

    return view('backend.access.menu', [
      'title' => "Menu access {$role->name}",
      'role' => $role,
      'menus' => $menus,
      'assignedMenuIds' => $assignedMenuIds
    ]);
  }

  public function camenu(Request $request)
  {
    // Ambil role_id dan menu_id dari request
    $roleId = $request->role_id;
    $menuId = $request->menu_id;

    // Data untuk operasi insert/delete
    $data = [
      'role_id' => $roleId,
      'menu_id' => $menuId
    ];

    // Periksa apakah data sudah ada di tabel pivot
    $exists = DB::table('role_has_menu')->where($data)->exists();

    if ($exists) {
      // Jika sudah ada, hapus data
      DB::table('role_has_menu')->where($data)->delete();
      $message = 'Data menu! berhasil dihapus!';
    } else {
      // Jika belum ada, tambahkan data
      DB::table('role_has_menu')->insert($data);
      $message = 'Data menu! berhasil ditambahkan!';
    }

    Cache::forget("access_role_menus_{$roleId}");

    return response()->json([
      'success' => true,
      'message' => $message
    ]);
  }

  public function asubmenu($id)
  {
    $cacheKey = "access_role_submenus_{$id}";

    $role = Cache::remember($cacheKey, 5 * 60, function () use ($id) {
      return Role::with(['submenus' => function ($query) {
        $query->select('submenus.id');
      }])->findOrFail($id);
    });

    $assignedSubmenuIds = $role->submenus->pluck('id')->toArray();

    $submenus = Submenu::select('id', 'ssm', 'name')
      ->orderBy('sm', 'asc')
      ->paginate(10);

    return view('backend.access.submenu', [
      'title' => "Submenu access {$role->name}",
      'role' => $role,
      'submenus' => $submenus,
      'assignedSubmenuIds' => $assignedSubmenuIds
    ]);
  }

  public function casubmenu(Request $request)
  {
    // Ambil role_id dan menu_id dari request
    $roleId = $request->role_id;
    $submenuId = $request->submenu_id;

    // Data untuk operasi insert/delete
    $data = [
      'role_id' => $roleId,
      'submenu_id' => $submenuId
    ];

    // Periksa apakah data sudah ada di tabel pivot
    $exists = DB::table('role_has_submenu')->where($data)->exists();

    if ($exists) {
      // Jika sudah ada, hapus data
      DB::table('role_has_submenu')->where($data)->delete();
      $message = 'Data submenu! berhasil dihapus!';
    } else {
      // Jika belum ada, tambahkan data
      DB::table('role_has_submenu')->insert($data);
      $message = 'Data submenu! berhasil ditambahkan!';
    }

    Cache::forget("access_role_submenus_{$roleId}");

    return response()->json([
      'success' => true,
      'message' => $message
    ]);
  }

  public function apermission($id)
  {
    $cacheKey = "access_role_permissions_{$id}";

    $role = Cache::remember($cacheKey, 5 * 60, function () use ($id) {
      return Role::with(['permissions' => function ($query) {
        $query->select('permissions.id');
      }])->findOrFail($id);
    });

    $assignedPermissionIds = $role->permissions->pluck('id')->toArray();

    $permissions = Permission::select('id', 'name')
      ->orderBy('id', 'asc')
      ->paginate(100);

    $groupper = $permissions->sortBy('id')->groupBy(
      function ($permission) {
        $controller = explode('.', $permission->name)[0];
        return ucfirst($controller);
      }
    );

    return view('backend.access.permission', [
      'title' => "Permission access {$role->name}",
      'role' => $role,
      'groupper' => $groupper,
      'assignedPermissionIds' => $assignedPermissionIds
    ]);
  }

  public function capermission(Request $request)
  {
    // Ambil role_id dan menu_id dari request
    $roleId = $request->role_id;
    $permissionId = $request->permission_id;

    // Data untuk operasi insert/delete
    $data = [
      'role_id' => $roleId,
      'permission_id' => $permissionId
    ];

    // Periksa apakah data sudah ada di tabel pivot
    $exists = DB::table('role_has_permission')->where($data)->exists();

    if ($exists) {
      // Jika sudah ada, hapus data
      DB::table('role_has_permission')->where($data)->delete();
      $message = 'Data permission! berhasil dihapus!';
    } else {
      // Jika belum ada, tambahkan data
      DB::table('role_has_permission')->insert($data);
      $message = 'Data permission! berhasil ditambahkan!';
    }

    Cache::forget("access_role_permissions_{$roleId}");

    return response()->json([
      'success' => true,
      'message' => $message
    ]);
  }
}
