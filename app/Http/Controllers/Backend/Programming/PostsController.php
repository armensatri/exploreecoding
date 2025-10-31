<?php

namespace App\Http\Controllers\Backend\Programming;

use Illuminate\Http\Request;
use App\Models\Programming\Post;
use App\Http\Controllers\Controller;

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
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(PostSr $request)
  {
    //
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
}
