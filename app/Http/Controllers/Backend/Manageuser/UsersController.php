<?php

namespace App\Http\Controllers\Backend\Manageuser;

use App\Helpers\RandomUrl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Traits\Controllers\ValidationUnique;

use App\Models\Manageuser\{
  Role,
  User
};

use Illuminate\Support\Facades\{
  Cache,
  Storage,
};

use App\Http\Requests\Manageuser\User\{
  UserSr,
  UserUr
};

class UsersController extends Controller
{
  use ValidationUnique;

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $cacheKey =
      'manageuser_users_page_' . request()->get('page', 1) .
      '_search_' . request('search') .
      '_role_' . request('role');

    $users = Cache::remember(
      $cacheKey,
      now()->addMinutes(5),
      function () {
        return User::query()
          ->search(request(['search', 'role']))
          ->select([
            'id',
            'image',
            'name',
            'email',
            'role_id',
            'url'
          ])
          ->with(['role:id,name,bg,text'])
          ->orderby('id', 'asc')
          ->paginate(15)
          ->withQueryString();
      }
    );

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
    $roles = Role::query()->select('id', 'name')
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
    $datastore = $request->validated();

    $datastore['url'] = RandomUrl::generateUrl();

    if ($request->hasFile('image')) {
      $datastore['image'] = $request->file('image')->store(
        '/manageuser/users'
      );
    }

    $datastore['role_id'] = $request->role_id;

    User::create($datastore);

    Alert::success(
      'success',
      'Data user! berhasil di tambahkan.'
    );

    return redirect()->route('users.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    return view('backend.manageuser.users.show', [
      'title' => 'Detail data user',
      'user' => $user
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(User $user)
  {
    $roles = Role::query()->select('id', 'name')
      ->orderBy('sr', 'asc')
      ->get();

    return view('backend.manageuser.users.edit', [
      'title' => 'Edit data user',
      'user' => $user,
      'roles' => $roles
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UserUr $request, User $user)
  {
    $dataupdate = $request->validated();

    $this->fieldUnique(
      $request,
      $user,
      ['username', 'email'],
      [
        'username.unique' => 'User..username! sudah terdaptar',
        'email.unique'    => 'User..email! sudah terdaptar',
      ]
    );

    if ($request->hasFile('image')) {
      if (!empty($user->image)) {
        Storage::delete($user->image);
      }

      $dataupdate['image'] = $request->file('image')->store(
        '/manageuser/users'
      );
    }

    $dataupdate['role_id'] = $request->role_id;

    $user->update($dataupdate);

    Alert::success(
      'success',
      'Data user! berhasil di update.'
    );

    return redirect()->route('users.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    if (in_array($user->username, ['armensatri'])) {
      Alert::warning(
        'Oops...',
        'Data user! tidak bisa di delete.'
      );

      return redirect()->route('users.index');
    }

    if ($user->image) {
      Storage::delete($user->image);
    }

    User::destroy($user->id);

    Alert::success(
      'success',
      'Data user! berhasil di delete.'
    );

    return redirect()->route('users.index');
  }

  public function changeStatus($id, $status)
  {
    $user = User::findOrFail($id);

    $isBanned = $status === 'banned';

    $user->status = $isBanned ? 0 : 1;
    $user->save();

    $message = $isBanned
      ? "User {$user->username}! berhasil di banned."
      : "User {$user->username}! berhasil di unbanned.";

    Alert::success('success', $message);

    return redirect()->route('visitor');
  }
}
