<?php

namespace App\Http\Controllers\Backend\Programming;

use App\Helpers\RandomUrl;
use App\Models\Published\Status;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

use App\Traits\Controller\{
  ImageStore,
  ImageUpdate
};

use App\Models\Programming\{
  Post,
  Playlist
};

use Illuminate\Support\Facades\{
  Auth,
  Cache,
  Storage
};

use App\Http\Requests\Programming\Post\{
  PostSr,
  PostUr
};

class PostsController extends Controller
{
  use ImageStore, ImageUpdate;

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $filters = request(['search', 'playlist', 'status', 'user']);
    $userKey = Auth::id() . ':' . Auth::user()->role_id;

    $cacheKey = 'posts.index.ids.'
      . Post::cacheVersion() . '.'
      . $userKey . '.'
      . md5(json_encode($filters));

    $ids = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      fn() => Post::query()
        ->AccessPosts(Auth::user())
        ->search($filters)
        ->orderBy('playlist_id', 'asc')
        ->pluck('id')
        ->toArray()
    );

    $posts = Post::query()
      ->whereIn('id', $ids)
      ->select([
        'id',
        'user_id',
        'status_id',
        'playlist_id',
        'sp',
        'title',
        'url'
      ])
      ->with([
        'user:id,username',
        'playlist:id,name',
        'status:id,name,bg,text',
      ])
      ->orderBy('playlists_id', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.programming.posts.index', [
      'title' => 'Semua data posts',
      'posts' => $posts
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Post $post)
  {
    $statuses = Status::query()->select('id', 'name')
      ->orderBy('id', 'asc')
      ->get();

    $playlists = Playlist::query()->select('id', 'name')
      ->orderBy('id', 'asc')
      ->get();

    return view('backend.programming.posts.create', [
      'title' => 'Create data post',
      'post' => $post,
      'statuses' => $statuses,
      'playlists' => $playlists
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(PostSr $request)
  {
    $datastore = $request->validated();

    $datastore['user_id'] = Auth::user()->id;
    $datastore['url'] = RandomUrl::generateUrl();

    $datastore['image'] = $this->handleImageStore(
      $request,
      'image',
      'programming/posts'
    );

    $post = Post::create($datastore);

    Alert::html(
      'success',
      "Data post!
        <span style='color:#2563eb;'>
          {$post->title}
        </span> berhasil di tambahkan",
      'success'
    );

    return redirect()->route('posts.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Post $post)
  {
    return view('backend.programming.posts.show', [
      'title' => 'Detail data post',
      'post' => $post,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Post $post)
  {
    $statuses = Status::query()->select('id', 'name')
      ->orderBy('id', 'asc')
      ->get();

    $playlists = Playlist::query()->select('id', 'name')
      ->orderBy('id', 'asc')
      ->get();

    return view('backend.programming.posts.edit', [
      'title' => 'Edit data post',
      'post' => $post,
      'statuses' => $statuses,
      'playlists' => $playlists
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(PostUr $request, Post $post)
  {
    $dataupdate = $request->validated();

    $dataupdate['user_id'] = Auth::user()->id;

    $dataupdate['image'] = $this->handleImageUpdate(
      $request,
      $post,
      'image',
      'programming/posts'
    );

    $post->update($dataupdate);

    Alert::html(
      'success',
      "Data post!
        <span style='color:#2563eb;'>
          {$post->title}
        </span> berhasil di update",
      'success'
    );

    return redirect()->route('posts.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Post $post)
  {
    if ($post->image) {
      Storage::delete($post->image);
    }

    Post::destroy($post->id);

    Alert::html(
      'success',
      "Data post!
        <span style='color:#2563eb;'>
          {$post->title}
        </span> berhasil di delete",
      'success'
    );

    return redirect()->route('posts.index');
  }
}
