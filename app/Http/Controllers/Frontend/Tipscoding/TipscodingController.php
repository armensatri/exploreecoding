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
        'user_id'
      ])
      ->with([
        'category:id,name,url',
        'user:id,username'
      ])
      ->orderBy('id', 'desc')
      ->paginate(12);

    $totaltipscodings = Tipscoding::count();

    // $categories = Category::query()
    //   ->select([
    //     'id',
    //     'sc',
    //     'name',
    //     'image',
    //     'url'
    //   ])
    //   ->withCount('tipscoding')
    //   ->orderBy('sc', 'asc')
    //   ->get();

    return view('frontend.tipscoding.tipscoding.index', [
      'title' => 'Tipscoding',
      'tipscodings' => $tipscodings,
      'totaltipscodings' => $totaltipscodings,
      // 'cate'
    ]);
  }
}
