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
        'url'
      ])
      ->withCount('tipscodings')
      ->orderBy('sc', 'asc')
      ->get();

    $totaltipscodings = Tipscoding::count();

    return view('frontend.tipscoding.category.index', [
      'title' => 'Tips categori',
      'categories' => $categories,
      'totaltipscodings' => $totaltipscodings
    ]);
  }
}
