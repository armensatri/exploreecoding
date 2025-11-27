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
  public function accessSubmenu($url)
  {
    $cacheKey = 'roleaccesssubmenu.accessSubmenu.' . $url . '.' . md5(
      json_encode(
        request()->all()
      )
    );

    [$role, $submenus] = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      function () use ($url) {
        $role = Role::query()->where('url', $url)
          ->firstOrFail();
        $submenus = Submenu::query()
          ->select(['id', 'ssm', 'name', 'url'])
          ->orderBy('sm', 'asc')
          ->paginate(10)
          ->withQueryString();

        return [$role, $submenus];
      }
    );
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
