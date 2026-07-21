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
      'title' => 'Semua tipscodings',
      'categories' => $categories,
      'tipscodings' => $tipscodings
    ]);
  }

  public function category(Category $category)
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
      ->whereHas('category', function ($q) use ($category) {
        $q->where('slug', $category->slug);
      })
      ->select([
        'id',
        'title',
        'slug',
        'excerpt',
        'category_id',
        'user_id',
        'created_at',
      ])
      ->withCount('tipscodingviews')
      ->with([
        'category:id,name,slug',
        'user:id,username'
      ])
      ->orderBy('id', 'desc')
      ->paginate(12);

    $tipstotal = Tipscoding::count();

    return view('frontend.tipscoding.tipscoding-category.index', [
      'title' => "Tipscodings category $category->slug",
      'category' => $category,
      'categories' => $categories,
      'tipscodings' => $tipscodings,
      'tipstotal' => $tipstotal
    ]);
  }

  public function show(Category $category, Tipscoding $tipscoding)
  {
    $tipstotal = Tipscoding::count();

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

    $tipscoding->load([
      'category:id,name,slug',
      'user:id,username',
    ]);

    $tipscoding->loadCount('tipscodingviews');

    return view('frontend.tipscoding.show.index', [
      'title' => "tipscodings $category->slug $tipscoding->slug",
      'category' => $category,
      'tipscoding' => $tipscoding,
      'tipstotal' => $tipstotal,
      'categories' => $categories
    ]);
  }
}
