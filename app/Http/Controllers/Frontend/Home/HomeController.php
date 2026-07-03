<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\Tipscoding\Tipscoding;

use App\Models\Programming\{
  Path,
  Roadmap,
  Playlist,
  Post
};

class HomeController extends Controller
{
  public function index()
  {
    $paths = Path::query()
      ->select([
        'id',
        'sp',
        'name',
        'status_id',
        'description',
        'created_at',
      ])
      ->with([
        'status:id,bg,name,text',
        'roadmaps.playlists.posts'
      ])
      ->withCount([
        'roadmaps',
      ])
      ->whereIn('sp', [1, 2, 3, 4, 5])
      ->orderBy('sp', 'asc')
      ->get();

    $tipscodings = Tipscoding::query()
      ->select([
        'id',
        'title',
        'excerpt',
        'category_id',
        'user_id'
      ])
      ->with(['category:id,name', 'user:id,username'])
      ->get();

    return view('frontend.home.index', [
      'title' => 'Home',
      'paths' => $paths,
      'populerpaths' => $paths->whereIn('sp', [1, 3, 5])->take(3),
      'tipscodings' => $tipscodings,
      'roadmaps' => Roadmap::count(),
      'playlists' => Playlist::count(),
      'posts' => Post::count(),
    ]);
  }
}
