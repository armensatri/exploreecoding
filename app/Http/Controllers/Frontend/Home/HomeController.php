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
    $pathQuery = Path::query()
      ->select([
        'id',
        'sp',
        'name',
        'slug',
        'status_id',
        'description',
        'created_at',
      ])
      ->with([
        'status:id,bg,name,text',
      ])
      ->withCount([
        'roadmaps',
        'playlists',
        'pathviews',
      ])
      ->selectSub(
        Post::query()
          ->selectRaw('COUNT(posts.id)')
          ->join('playlists', 'posts.playlist_id', '=', 'playlists.id')
          ->join('roadmaps', 'playlists.roadmap_id', '=', 'roadmaps.id')
          ->whereColumn('roadmaps.path_id', 'paths.id'),
        'posts_count'
      )
      ->whereIn('sp', [1, 2, 3, 4, 5]);

    $paths = $pathQuery
      ->orderBy('sp')
      ->get();

    $populerpaths = $paths
      ->sortByDesc('pathviews_count')
      ->take(3)
      ->values();

    $tipscodings = Tipscoding::query()
      ->select([
        'id',
        'title',
        'slug',
        'excerpt',
        'category_id',
        'user_id',
        'created_at',
      ])
      ->whereIn('id', [1, 2, 3, 4, 5])
      ->withCount('tipscodingviews')
      ->with([
        'category:id,name,slug',
        'user:id,username'
      ])->get();

    return view('frontend.home.index', [
      'title' => 'Home',
      'paths' => $paths,
      'populerpaths' => $populerpaths,
      'tipscodings' => $tipscodings,
      'roadmaps' => Roadmap::count(),
      'playlists' => Playlist::count(),
      'posts' => Post::count(),
    ]);
  }
}
