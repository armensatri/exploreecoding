<?php

namespace App\Http\Controllers\Frontend\Tipscoding;

use Illuminate\Http\Request;
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
        'url'
      ])->withCount('tipscodings')
      ->orderBy('sc', 'asc')
      ->get();

    $tipscodings = Tipscoding::query()
      ->select([
        'id',
        'title',
        'excerpt',
        'category_id',
        'user_id'
      ])
      ->with(['category:id,name', 'user:id,username'])
      ->orderBy('id', 'desc')
      ->paginate(12);

    return view('frontend.tipscoding.tipscoding.index', [
      'title' => 'Tips coding',
      'tipscodings' => $tipscodings,
      'categories' => $categories
    ]);
  }

  public function category()
  {
    return view('');
  }
}
