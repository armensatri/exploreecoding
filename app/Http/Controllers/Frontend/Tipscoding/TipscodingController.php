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
    $tipscodings = Tipscoding::with('category:id,name')->paginate(6);
    $categories = Category::all();

    return view('frontend.tipscoding.tipscoding.index', [
      'title' => 'Tips coding',
      'tipscodings' => $tipscodings,
      'categories' => $categories
    ]);
  }
}
