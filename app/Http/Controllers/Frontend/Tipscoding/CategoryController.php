<?php

namespace App\Http\Controllers\Frontend\Tipscoding;

use App\Http\Controllers\Controller;

use App\Models\Tipscoding\{
  Category,
  Tipscoding
};

class CategoryController extends Controller
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
      ->get();

    $tipscodings = Tipscoding::count();

    return view('frontend.tipscoding.category.index', [
      'title' => 'Tips categori',
      'categories' => $categories,
      'tipscodings' => $tipscodings
    ]);
  }
}
