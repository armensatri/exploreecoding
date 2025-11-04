<?php

namespace App\Http\Controllers\Backend\Programming;

use App\Helpers\RandomUrl;
use Illuminate\Http\Request;
use App\Models\Published\Status;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Programming\{
  Post,
  Playlist
};

use App\Http\Requests\Programming\Post\{
  PostSr,
  PostUr,
};

class PostsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $posts = Post::query()
      ->search(request(['search', 'playlist']))
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
        'status:id,name,bg,text',
        'playlist:id,name'
      ])
      ->orderBy('playlist_id', 'asc')
      ->paginate(15)
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

    if ($request->hasFile('image')) {
      $datastore['image'] = $request->file('image')->store(
        '/programming/posts'
      );
    }

    Post::create($datastore);

    Alert::success(
      'success',
      'Data post! berhasil di tambahkan.'
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
}
