<?php

namespace App\Http\Controllers\Backend\Programming;

use Illuminate\Http\Request;
use App\Helpers\Submenuaccess;
use App\Models\Programming\Post;
use App\Models\Published\Status;
use App\Http\Controllers\Controller;
use App\Models\Programming\Playlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Programming\Post\PostSr;
use App\Http\Requests\Programming\Post\PostUr;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{
  public function __construct()
  {
    Submenuaccess::Submenu();
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $posts = Post::search(request(['search', 'playlist', 'status']))
      ->select(['id', 'playlist_id', 'sp', 'image', 'title', 'status_id', 'slug'])
      ->where('user_id', Auth::user()->id)
      ->with(['playlist', 'status', 'user'])
      ->orderby('playlist_id', 'asc')
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
    $playlists = Playlist::select('id', 'name')
      ->orderby('spl', 'asc')
      ->get();

    $statuses = Status::select('id', 'name')
      ->orderby('ss', 'asc')
      ->get();

    return view('backend.programming.posts.create', [
      'title' => 'Create data post',
      'post' => $post,
      'playlists' => $playlists,
      'statuses' => $statuses
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(PostSr $request)
  {
    $datastore = $request->validated();

    if ($request->hasFile('image')) {
      $datastore['image'] = $request->file('image')->store(
        '/programming/posts'
      );
    }

    $datastore['status_id'] = $request->status_id;
    $datastore['user_id'] = Auth::user()->id;

    Post::create($datastore);

    Alert::success(
      'success',
      'Data post! berhasil di tambahkan.'
    );

    if ($datastore['status_id'] === 1) {
      return redirect()->route('posts.draft');
    }

    return redirect()->route('posts.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Post $post)
  {
    return view('backend.programming.posts.show', [
      'title' => 'Detail data posts',
      'post' => $post
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Post $post)
  {
    $playlists = Playlist::select('id', 'name')
      ->orderby('spl', 'asc')
      ->get();

    $statuses = Status::select('id', 'name')
      ->orderby('ss', 'asc')
      ->get();

    return view('backend.programming.posts.edit', [
      'title' => 'Edit data post',
      'post' => $post,
      'playlists' => $playlists,
      'statuses' => $statuses
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(PostUr $request, Post $post)
  {
    $dataupdate = $request->validated();

    if ($request->slug != $post->slug) {
      $rules = [
        'slug' => 'unique:posts,slug,' . $post->id,
      ];

      $messages = [
        'slug.unique' => 'Post..slug! sudah terdaptar',
      ];

      $request->validate($rules, $messages);
    }

    if ($request->hasFile('image')) {
      if (!empty($post->image)) {
        Storage::delete($post->image);
      }

      $dataupdate['image'] = $request->file('image')->store(
        '/programming/posts'
      );
    }

    if (isset($dataupdate['status_id'])) {
      $post->status_id = $dataupdate['status_id'];
    }

    $dataupdate['user_id'] = Auth::user()->id;

    $post->update($dataupdate);

    Alert::success(
      'success',
      'Data post! berhasil di update.'
    );

    if ($dataupdate['status_id'] === 1) {
      return redirect()->route('posts.draft');
    }

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

    Alert::success(
      'success',
      'Data post! berhasil di delete.'
    );

    return redirect()->route('posts.index');
  }

  /**
   * Generate resource slug otomatis.
   */
  public function slug(Request $request)
  {
    $slug = SlugService::createSlug(
      Post::class,
      'slug',
      $request->title
    );

    return response()->json(['slug' => $slug]);
  }

  /**
   * Display a listing of the resource.
   */
  public function draft()
  {
    $posts = Post::draft(request(['search', 'playlist']))
      ->select(['id', 'playlist_id', 'sp', 'image', 'title', 'status_id', 'slug'])
      ->where('user_id', Auth::user()->id)
      ->with(['playlist', 'status', 'user'])
      ->orderby('playlist_id', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.programming.posts.draft', [
      'title' => 'Semua data draft posts',
      'posts' => $posts
    ]);
  }
}
