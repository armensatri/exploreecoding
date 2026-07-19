<?php

namespace App\Http\Controllers\Frontend\Tipscoding;

use App\Http\Controllers\Controller;

use App\Models\Tipscoding\{
  Category,
  Tipscoding
};

class TipscodingController extends Controller
{
  public function index()
  {
    $categories = Category::query()
      ->select([
        'id',
        'sc',
        'name',
        'image',
        'slug'
      ])
      ->withCount('tipscodings')
      ->orderBy('sc', 'asc')
      ->limit(15)
      ->get();

    $tipscodings = Tipscoding::query()
      ->select([
        'id',
        'title',
        'excerpt',
        'category_id',
        'user_id',
        'created_at',
        'slug'
      ])
      ->withCount('tipscodingviews')
      ->with([
        'category:id,name,slug',
        'user:id,username'
      ])
      ->orderBy('id', 'desc')
      ->paginate(12);

    return view('frontend.tipscoding.tipscoding.index', [
      'title' => 'Semua tipscoding',
      'categories' => $categories,
      'tipscodings' => $tipscodings
    ]);
  }
}
