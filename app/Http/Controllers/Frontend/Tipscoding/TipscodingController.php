<?php

namespace App\Http\Controllers\Frontend\Tipscoding;

use App\Http\Controllers\Controller;
use App\Models\Tipscoding\Category;
use App\Models\Tipscoding\Tipscoding;

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
        'slug',
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
        'slug',
      ])
      ->withCount('tipscodingviews')
      ->with([
        'category:id,name,slug,image',
        'user:id,username,image',
      ])
      ->orderBy('id', 'desc')
      ->paginate(12);

    return view('frontend.tipscoding.tipscoding.index', [
      'title' => 'Semua tipscodings',
      'categories' => $categories,
      'tipscodings' => $tipscodings,
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
        'slug',
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
        'category:id,name,slug,image',
        'user:id,username,image',
      ])
      ->orderBy('id', 'desc')
      ->paginate(12);

    $tipstotal = Tipscoding::count();

    return view('frontend.tipscoding.tipscoding-category.index', [
      'title' => "Tipscodings category $category->slug",
      'category' => $category,
      'categories' => $categories,
      'tipscodings' => $tipscodings,
      'tipstotal' => $tipstotal,
    ]);
  }

  public function show(Category $category, Tipscoding $tipscoding)
  {
    $tipstotal = Tipscoding::count();
    $categorytotal = Category::count();

    $tipscoding->load([
      'category:id,name,slug,image',
      'user:id,username,image',
    ]);

    $tipscoding->loadCount('tipscodingviews');

    $relatedTips = Tipscoding::query()
      ->select([
        'id',
        'category_id',
        'user_id',
        'title',
        'slug',
        'image',
        'created_at',
      ])
      ->where('category_id', $tipscoding->category_id)
      ->whereKeyNot($tipscoding->id)
      ->with([
        'category:id,name,slug,image',
        'user:id,username',
      ])
      ->withCount('tipscodingviews')
      ->orderByDesc('tipscodingviews_count')
      ->orderByDesc('created_at')
      ->limit(5)
      ->get();

    if ($relatedTips->count() < 5) {

      $excludeIds = $relatedTips
        ->pluck('id')
        ->push($tipscoding->id);

      $additionalTips = Tipscoding::query()
        ->select([
          'id',
          'category_id',
          'user_id',
          'title',
          'slug',
          'image',
          'created_at',
        ])
        ->whereNotIn('id', $excludeIds)
        ->with([
          'category:id,name,slug,image',
          'user:id,username',
        ])
        ->withCount('tipscodingviews')
        ->orderByDesc('tipscodingviews_count')
        ->orderByDesc('created_at')
        ->limit(5 - $relatedTips->count())
        ->get();

      $relatedTips = $relatedTips->concat($additionalTips);
    }

    return view('frontend.tipscoding.show.index', [
      'title' => "tipscodings $category->slug $tipscoding->slug",
      'category' => $category,
      'tipscoding' => $tipscoding,
      'relatedTips'   => $relatedTips,
      'tipstotal' => $tipstotal,
      'categorytotal' => $categorytotal,
    ]);
  }
}
