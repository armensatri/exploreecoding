<?php

namespace App\Http\Controllers\Backend\Programming;

use Illuminate\Http\Request;
use App\Models\Programming\Post;
use App\Models\Published\Status;
use App\Http\Controllers\Controller;
use App\Models\Programming\Playlist;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Programming\Post\PostSr;
use App\Http\Requests\Programming\Post\PostUr;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $posts = Post::search(request(['search', 'playlist', 'status']))
      ->select(['id', 'playlist_id', 'sp', 'image', 'title', 'status_id', 'slug'])
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
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Post $post)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(PostUr $request, Post $post)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Post $post)
  {
    //
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
