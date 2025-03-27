<?php

namespace App\Http\Controllers\Backend\Programming;

use Illuminate\Http\Request;
use App\Models\Programming\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Programming\Post\PostSr;
use App\Http\Requests\Programming\Post\PostUr;

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
