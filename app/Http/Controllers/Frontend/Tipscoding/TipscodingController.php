<?php

namespace App\Http\Controllers\Frontend\Tipscoding;

use App\Http\Controllers\Controller;
use App\Models\Tipscoding\Category;
use App\Models\Tipscoding\Tipscoding;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
    if (!Auth::check()) {
      Alert::html(
        'Oops...',
        "Login dulu!
        <span style='color:#2563eb;'>
          untuk membaca
        </span> tipscoding",
        'warning'
      );

      return redirect()->route('login');
    }

    $tipscoding->tipscodingviews()->firstOrCreate([
      'user_id' => Auth::id()
    ]);

    $tipscoding->load([
      'category:id,name,slug,image',
      'user:id,username,image',
    ])->loadCount('tipscodingviews');

    $tipstotal = Tipscoding::count();
    $categorytotal = Category::count();

    $baseQuery = fn() => Tipscoding::query()
      ->select([
        'id',
        'user_id',
        'category_id',
        'title',
        'slug',
        'image',
        'created_at'
      ])->latest();

    $relatedTips = $baseQuery()
      ->where('category_id', $tipscoding->category_id)
      ->whereKeyNot($tipscoding->id)
      ->limit(6)
      ->get();

    if (($needed = 6 - $relatedTips->count()) > 0) {
      $excludeIds = $relatedTips
        ->pluck('id')
        ->push($tipscoding->id);

      $additionalTips = $baseQuery()
        ->whereNotIn('id', $excludeIds)
        ->limit($needed)
        ->get();

      $relatedTips = $relatedTips->concat($additionalTips);
    }

    $relatedTips->load([
      'user:id,username',
      'category:id,slug'
    ]);

    $relatedcategories = Category::query()
      ->select([
        'id',
        'name',
        'slug',
        'image'
      ])
      ->where('id', '!=', $category->id)
      ->inRandomOrder()
      ->limit(10)
      ->get();

    return view('frontend.tipscoding.show.index', [
      'title' => "tipscodings $category->slug $tipscoding->slug",
      'category' => $category,
      'tipscoding' => $tipscoding,
      'relatedTips'   => $relatedTips,
      'tipstotal' => $tipstotal,
      'categorytotal' => $categorytotal,
      'relatedcategories' => $relatedcategories
    ]);
  }
}
