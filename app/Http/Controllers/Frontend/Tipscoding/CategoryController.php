<?php

namespace App\Http\Controllers\Frontend\Tipscoding;

use App\Models\Tipscoding\Category;
use App\Http\Controllers\Controller;

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

    return view('frontend.tipscoding.category.index', [
      'title' => 'Tips categori',
      'categories' => $categories
    ]);
  }
}
