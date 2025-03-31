<?php

namespace App\Http\Controllers\Backend\Published;

use Illuminate\Http\Request;
use App\Models\Manageuser\User;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
  public function index()
  {
    $users = User::search(request(['search', 'role']))
      ->select(['id', 'image', 'name', 'role_id', 'username'])
      ->with(['role', 'posts'])
      ->has('posts')
      ->withCount([
        'posts',
        'posts as draft_posts_count' => function ($query) {
          $query->where('status_id', 1);
        }
      ])
      ->orderby('id', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.published.author.index', [
      'title' => 'Semua data author published',
      'users' => $users
    ]);
  }

  public function posts(User $user)
  {
    $posts = $user->posts()
      ->select(['id', 'playlist_id', 'sp', 'image', 'title', 'status_id', 'slug'])
      ->with(['playlist', 'status'])
      ->orderBy('playlist_id', 'asc')->get();

    return view('backend.published.author.posts', [
      'title' => 'Author posts ' . $user->username,
      'posts' => $posts,
    ]);
  }
}
