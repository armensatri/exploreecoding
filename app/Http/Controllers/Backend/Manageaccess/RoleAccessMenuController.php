<?php

namespace App\Http\Controllers\Backend\Manageaccess;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Managemenu\Menu;
use App\Models\Manageuser\Role;
use Illuminate\Support\Facades\DB;

class RoleAccessMenuController extends Controller
{
  public function accessMenu($url)
  {
    $role = Role::query()->where('url', $url)
      ->firstOrFail();

    $menus = Menu::query()
      ->select(['id', 'sm', 'name', 'url'])
      ->orderBy('sm', 'asc')
      ->paginate(15)
      ->withQueryString();

    return view('backend.manageaccess.menu.index', [
      'title' => 'Access menu',
      'role' => $role,
      'menus' => $menus
    ]);
  }

  public function accessUpMenu(Request $request)
  {
    $roleId = $request->role_id;
    $menuId = $request->menu_id;

    $data = [
      'role_id' => $roleId,
      'menu_id' => $menuId
    ];

    $exists = DB::table('role_has_menu')
      ->where($data)
      ->exists();

    $exists
      ? DB::table('role_has_menu')->where($data)->delete()
      : DB::table('role_has_menu')->insert($data);

    $message = $exists
      ? 'Menu access! berhasil di delete.'
      : 'Menu access! berhasil di tambahkan.';

    return response()->json([
      'success' => true,
      'message' => $message
    ]);
  }
}
