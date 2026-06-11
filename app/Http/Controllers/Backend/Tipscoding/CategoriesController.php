<?php

namespace App\Http\Controllers\Backend\Tipscoding;

use App\Models\Tipscoding\Category;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\{
  Cache,
  Storage
};

use App\Traits\Controller\{
  ImageStore,
  ImageUpdate
};

use App\Http\Requests\Tipscoding\Category\{
  CategorySr,
  CategoryUr
};

class CategoriesController extends Controller
{
  use ImageStore, ImageUpdate;

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $filters = request(['search']);

    $cacheKey = 'categories.index.ids.'
      . Category::cacheVersion() . '.'
      . md5(json_encode($filters));

    $ids = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      fn() => Category::query()
        ->search($filters)
        ->orderBy('sc', 'asc')
        ->pluck('id')
        ->toArray()
    );

    $categories = Category::query()
      ->whereIn('id', $ids)
      ->select([
        'id',
        'sc',
        'name',
        'slug'
      ])
      ->orderBy('sc', 'asc')
      ->paginate(10)
      ->withQueryString();

    return view('backend.tipscoding.categories.index', [
      'title' => 'Semua data categories',
      'categories' => $categories
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Category $category)
  {
    return view('backend.tipscoding.categories.create', [
      'title' => 'Create data category',
      'category' => $category
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(CategorySr $request)
  {
    $datastore = $request->validated();

    $datastore['image'] = $this->handleImageStore(
      $request,
      'image',
      'tipscoding/categories'
    );

    $category = Category::create($datastore);

    Alert::html(
      'success',
      "Data category!
        <span style='color:#2563eb;'>
          {$category->name}
        </span> berhasil di tambahkan",
      'success'
    );

    return redirect()->route('categories.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Category $category)
  {
    return view('backend.tipscoding.categories.show', [
      'title' => 'Detail data category',
      'category' => $category
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Category $category)
  {
    return view('backend.tipscoding.categories.edit', [
      'title' => 'Edit data category',
      'category' => $category
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(CategoryUr $request, Category $category)
  {
    $dataupdate = $request->validated();

    $dataupdate['image'] = $this->handleImageUpdate(
      $request,
      $category,
      'image',
      'tipscoding/categories'
    );

    $category->update($dataupdate);

    Alert::html(
      'success',
      "Data category!
        <span style='color:#2563eb;'>
          {$category->name}
        </span> berhasil di update",
      'success'
    );

    return redirect()->route('categories.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Category $category)
  {
    if ($category->image) {
      Storage::delete($category->image);
    }

    Category::destroy($category->id);

    Alert::html(
      'success',
      "Data category!
        <span style='color:#2563eb;'>
          {$category->name}
        </span> berhasil di delete",
      'success'
    );

    return redirect()->route('categories.index');
  }
}
