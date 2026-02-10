<?php

namespace App\Http\Controllers\Frontend\Tipscoding;

use Illuminate\Http\Request;
use App\Models\Tipscoding\Category;
use App\Http\Controllers\Controller;
use App\Models\Tipscoding\Tipscoding;

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
      ])->withCount('tipscodings')
      ->orderBy('sc', 'asc')
      ->get();

    $tipscodings = Tipscoding::count();

    return view('frontend.tipscoding.category.index', [
      'title' => 'Categori',
      'categories' => $categories,
      'tipscodings' => $tipscodings
    ]);
  }
}
