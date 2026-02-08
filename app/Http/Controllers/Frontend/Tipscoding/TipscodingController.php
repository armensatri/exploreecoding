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
        'name'
      ])->withCount('tipscodings')
      ->orderBy('sc', 'asc')
      ->get();

    $tipscodings = Tipscoding::with('category:id,name', 'user:id,username')->paginate(12);

    return view('frontend.tipscoding.tipscoding.index', [
      'title' => 'Tips coding',
      'tipscodings' => $tipscodings,
      'categories' => $categories
    ]);
  }
}
