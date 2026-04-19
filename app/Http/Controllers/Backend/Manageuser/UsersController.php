<?php

namespace App\Http\Controllers\Backend\Manageuser;

use App\Helpers\RandomUrl;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Manageuser\{
  User,
  Role
};

use App\Traits\Controller\{
  ImageStore,
  ImageUpdate,
  ValidationUnique
};

use Illuminate\Support\Facades\{
  Cache,
  Storage
};

use App\Http\Requests\Manageuser\User\{
  UserSr,
  UserUr,
};

class UsersController extends Controller
{
  use ValidationUnique;
  use ImageStore, ImageUpdate;

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $filters = request(['search', 'role']);

    $cacheKey = 'users.index.ids.'
      . User::cacheVersion() . '.'
      . md5(json_encode($filters));

    $ids = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      fn() => User::query()
        ->search($filters)
        ->orderBy('id', 'asc')
        ->pluck('id')
        ->toArray()
    );

    $users = User::query()
      ->whereIn('id', $ids)
      ->select([
        'id',
        'image',
        'name',
        'email',
        'role_id',
        'url'
      ])->with(['role:id,name,bg,text'])
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

    $datastore['image'] = $this->handleImageStore(
      $request,
      'image',
      'manageuser/users'
    );

    $datastore['role_id'] = $request->role_id;

    $user = User::create($datastore);

    Alert::html(
      'success',
      "Data user!
        <span style='color:#2563eb;'>
          {$user->name}
        </span> berhasil di tambahkan",
      'success'
    );

    return redirect()->route('users.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    $user->load('role:id,name,bg,text');

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

    $dataupdate['image'] = $this->handleImageUpdate(
      $request,
      $user,
      'image',
      'manageuser/users'
    );

    $dataupdate['role_id'] = $request->role_id;

    $user->update($dataupdate);

    Alert::html(
      'success',
      "Data user!
        <span style='color:#2563eb;'>
          {$user->name}
        </span> berhasil di update",
      'success'
    );

    return redirect()->route('users.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    if (in_array($user->role->name, ['owner'])) {
      Alert::html(
        'Oops...',
        "Data user! role
        <span style='color:#2563eb;'>
          {$user->role->name}
        </span> tidak bisa di delete",
        'warning'
      );

      return redirect()->route('users.index');
    }

    if ($user->image) {
      Storage::delete($user->image);
    }

    User::destroy($user->id);

    Alert::html(
      'success',
      "Data user!
        <span style='color:#2563eb;'>
          {$user->name}
        </span> berhasil di delete",
      'success'
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
      : "User {$user->username}! berhasil di aktifkan.";

    Alert::success('success', $message);

    return redirect()->route('visitor');
  }
}
