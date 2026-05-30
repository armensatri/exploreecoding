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
    $tipscodings = Tipscoding::query()
      ->select([
        'id',
        'title',
        'excerpt',
        'category_id',
        'user_id',
        'url'
      ])
      ->with([
        'category:id,name,url',
        'user:id,username'
      ])
      ->orderBy('id', 'desc')
      ->paginate(12);

    $totaltipscodings = Tipscoding::count();

    $categories = Category::query()
      ->select([
        'id',
        'sc',
        'name',
        'image',
        'url'
      ])
      ->withCount('tipscodings')
      ->orderBy('sc', 'asc')
      ->get();

    return view('frontend.tipscoding.tipscoding.index', [
      'title' => 'Tipscoding',
      'tipscodings' => $tipscodings,
      'totaltipscodings' => $totaltipscodings,
      'categories' => $categories,
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
        'url'
      ])
      ->withCount('tipscodings')
      ->orderBy('sc', 'asc')
      ->get();

    $totaltipscodings = Tipscoding::count();

    $tipscodings = Tipscoding::query()
      ->whereHas('category', function ($q) use ($category) {
        $q->where('url', $category->url);
      })
      ->select([
        'id',
        'title',
        'excerpt',
        'category_id',
        'user_id',
        'url',
      ])
      ->with([
        'category:id,name,url',
        'user:id,username'
      ])
      ->orderBy('id', 'desc')
      ->paginate(12);

    return view('frontend.tipscoding.tipscoding.category', [
      'title' => 'Tips category ' . $category->name,
      'categories' => $categories,
      'category' => $category,
      'totaltipscodings' => $totaltipscodings,
      'tipscodings' => $tipscodings
    ]);
  }

  public function show()
  {
    return view('frontend.tipscoding.tipscoding.show', [
      'title' => 'show',
    ]);
  }
}
