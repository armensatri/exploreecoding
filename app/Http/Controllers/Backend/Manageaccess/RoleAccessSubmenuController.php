<?php

namespace App\Http\Controllers\Backend\Manageaccess;

use Illuminate\Http\Request;
use App\Models\Manageuser\Role;
use App\Models\Managemenu\Submenu;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RoleAccessSubmenuController extends Controller
{
  public function accessSubmenu($url)
  {
    $role = Role::query()->where('url', $url)
      ->firstOrFail();

    $submenus = Submenu::query()
      ->select(['id', 'ssm', 'name', 'url'])
      ->orderBy('sm', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.manageaccess.submenu.index', [
      'title' => 'Access submenu',
      'role' => $role,
      'submenus' => $submenus
    ]);
  }

  public function accessUpSubmenu(Request $request)
  {
    $roleId = $request->role_id;
    $submenuId = $request->submenu_id;

    $data = [
      'role_id' => $roleId,
      'submenu_id' => $submenuId
    ];

    $exists = DB::table('role_has_submenu')
      ->where($data)
      ->exists();

    $exists
      ? DB::table('role_has_submenu')->where($data)->delete()
      : DB::table('role_has_submenu')->insert($data);

    $message = $exists
      ? 'Submenu access! berhasil di delete.'
      : 'Submenu access! berhasil di tambahkan.';

    return response()->json([
      'success' => true,
      'message' => $message
    ]);
  }
}
