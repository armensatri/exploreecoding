<?php

namespace App\Http\Controllers\Backend\Manageuser;

use App\Helpers\LoginAccess;
use Illuminate\Http\Request;
use App\Helpers\Submenuaccess;
use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manageuser\User\UserSr;
use App\Http\Requests\Manageuser\User\UserUr;
use App\Models\Manageuser\Role;

class UsersController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $users = User::search(request(['search', 'role']))
      ->select(['id', 'name', 'username', 'email', 'image', 'role_id'])
      ->with(['role'])
      ->orderBy('id', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.manageuser.users.index', [
      'title' => 'Semua data users',
      'users' => $users
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(User $user)
  {
    $roles = Role::select('id', 'name')
      ->orderBy('sr', 'asc')
      ->get();

    return view('backend.manageuser.users.create', [
      'title' => 'Create data user',
      'user' => $user,
      'roles' => $roles
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(UserSr $request)
  {
    $dataStore = $request->validated();
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(User $user)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UserUr $request, User $user)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    //
  }
}
