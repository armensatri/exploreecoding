<?php

namespace App\Http\Controllers\Backend\Manageuser;

// use Illuminate\Http\Request;
use App\Helpers\RandomUrl;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manageuser\User\{UserSr, UserUr,};
use App\Models\Manageuser\Role;
use App\Models\Manageuser\User;
use App\Traits\Controller\ImageStore;
use App\Traits\Controller\ImageUpdate;
use App\Traits\Controller\ValidationUnique;
use Illuminate\Support\Facades\Cache;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
  use ValidationUnique;
  use ImageUpdate, ImageStore;

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

    User::create($datastore);

    Alert::success(
      'success',
      'Data user! berhasil di tambahkan'
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
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    //
  }
}
