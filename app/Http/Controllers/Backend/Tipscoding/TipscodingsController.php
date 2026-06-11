<?php

namespace App\Http\Controllers\Backend\Tipscoding;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Tipscoding\{
  Category,
  Tipscoding
};

use App\Traits\Controller\{
  ImageStore,
  ImageUpdate
};

use Illuminate\Support\Facades\{
  Auth,
  Cache,
  Storage
};

use App\Http\Requests\Tipscoding\Tipscoding\{
  TipscodingSr,
  TipscodingUr
};

class TipscodingsController extends Controller
{
  use ImageStore, ImageUpdate;

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $filters = request(['search', 'category', 'user']);
    $userKey = Auth::id() . ':' . Auth::user()->role_id;

    $cacheKey = 'tipscodings.index.ids.'
      . Tipscoding::cacheVersion() . '.'
      . $userKey . '.'
      . md5(json_encode($filters));

    $ids = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      fn() => Tipscoding::query()
        ->AccessTipscodings(Auth::user())
        ->search($filters)
        ->orderBy('category_id', 'asc')
        ->pluck('id')
        ->toArray()
    );

    $tipscodings = Tipscoding::query()
      ->whereIn('id', $ids)
      ->select([
        'id',
        'user_id',
        'category_id',
        'title',
        'slug'
      ])
      ->with([
        'user:id,username',
        'category:id,name'
      ])
      ->orderBy('category_id', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.tipscoding.tipscodings.index', [
      'title' => 'Semua data tipscodings',
      'tipscodings' => $tipscodings
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Tipscoding $tipscoding)
  {
    $categories = Category::query()->select('id', 'name')
      ->orderBy('id', 'asc')
      ->get();

    return view('backend.tipscoding.tipscodings.create', [
      'title' => 'Create data tipscoding',
      'tipscoding' => $tipscoding,
      'categories' => $categories
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(TipscodingSr $request)
  {
    $datastore = $request->validated();

    $datastore['user_id'] = Auth::user()->id;

    $datastore['image'] = $this->handleImageStore(
      $request,
      'image',
      'tipscoding/tipscodings'
    );

    $tipscoding = Tipscoding::create($datastore);

    Alert::html(
      'success',
      "Data tipscoding!
        <span style='color:#2563eb;'>
          {$tipscoding->title}
        </span> berhasil di tambahkan",
      'success'
    );

    return redirect()->route('tipscodings.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Tipscoding $tipscoding)
  {
    return view('backend.tipscoding.tipscodings.show', [
      'title' => 'Detail data tipscoding',
      'tipscoding' => $tipscoding
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Tipscoding $tipscoding)
  {
    $categories = Category::query()->select('id', 'name')
      ->orderBy('id', 'asc')
      ->get();

    return view('backend.tipscoding.tipscodings.edit', [
      'title' => 'Edit data tipscoding',
      'tipscoding' => $tipscoding,
      'categories' => $categories
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(TipscodingUr $request, Tipscoding $tipscoding)
  {
    $dataupdate = $request->validated();

    $dataupdate['user_id'] = Auth::user()->id;

    $dataupdate['image'] = $this->handleImageUpdate(
      $request,
      $tipscoding,
      'image',
      'tipscoding/tipscodings'
    );

    $tipscoding->update($dataupdate);

    Alert::html(
      'success',
      "Data tipscoding!
        <span style='color:#2563eb;'>
          {$tipscoding->title}
        </span> berhasil di update",
      'success'
    );

    return redirect()->route('tipscodings.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Tipscoding $tipscoding)
  {
    if ($tipscoding->image) {
      Storage::delete($tipscoding->image);
    }

    Tipscoding::destroy($tipscoding->id);

    Alert::html(
      'success',
      "Data tipscoding!
        <span style='color:#2563eb;'>
          {$tipscoding->title}
        </span> berhasil di delete",
      'success'
    );

    return redirect()->route('tipscodings.index');
  }
}
