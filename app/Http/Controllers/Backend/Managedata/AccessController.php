<?php

namespace App\Http\Controllers\Backend\Managedata;

use Illuminate\Http\Request;
use App\Models\Manageuser\Role;
use App\Http\Controllers\Controller;

class AccessController extends Controller
{
  public function index()
  {
    $roles = Role::query()
      ->search(request(['search']))
      ->select([
        'id',
        'sr',
        'name',
        'bg',
        'text',
        'url',
      ])
      ->orderBy('sr', 'asc')
      ->paginate(15)
      ->withQueryString();

    return view('backend.managedata.access.index', [
      'title' => 'Access',
      'roles' => $roles
    ]);
  }
}
