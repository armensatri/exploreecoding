<?php

namespace App\Http\Controllers\Backend\Published;

use App\Helpers\RandomUrl;
use Illuminate\Http\Request;
use App\Models\Published\Status;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use RealRashid\SweetAlert\Facades\Alert;
use App\Traits\Controllers\ValidationUnique;
use Cviebrock\EloquentSluggable\Services\SlugService;

use App\Http\Requests\Published\Status\{
  StatusSr,
  StatusUr,
};

class StatusesController extends Controller
{
  use ValidationUnique;

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $cacheKey = 'statuses.index.' . md5(
      json_encode(
        request(['search'])
      )
    );

    $statuses = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      function () {
        return Status::query()
          ->search(request(['search']))
          ->select([
            'id',
            'ss',
            'name',
            'bg',
            'text',
            'url',
            'description'
          ])
          ->orderBy('id', 'asc')
          ->paginate(10)
          ->withQueryString();
      }
    );

    return view('backend.published.statuses.index', [
      'title' => 'Semua data statuses',
      'statuses' => $statuses
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('backend.published.statuses.create', [
      'title' => 'Create data status'
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StatusSr $request)
  {
    $datastore = $request->validated();

    $datastore['url'] = RandomUrl::generateUrl();

    Status::create($datastore);

    Alert::success(
      'success',
      'Data status! berhasil di tambahkan.'
    );

    return redirect()->route('statuses.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Status $status)
  {
    $cacheKey = 'statuses.show.' . $status->id;

    $statusData = Cache::remember(
      $cacheKey,
      now()->addMinutes(10),
      function () use ($status) {
        return $status;
      }
    );

    return view('backend.published.statuses.show', [
      'title' => 'Detail data status',
      'status' => $statusData
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Status $status)
  {
    return view('backend.published.statuses.edit', [
      'title' => 'Edit data status',
      'status' => $status
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(StatusUr $request, Status $status)
  {
    $dataupdate = $request->validated();

    $this->fieldUnique(
      $request,
      $status,
      ['name', 'slug'],
      [
        'name.unique' => 'Status..name! sudah terdaptar',
        'slug.unique'    => 'Status..slug! sudah terdaptar',
      ]
    );

    $status->update($dataupdate);

    Alert::success(
      'success',
      'Data status! berhasil di update.'
    );

    return redirect()->route('statuses.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Status $status)
  {
    Status::destroy($status->id);

    Alert::success(
      'success',
      'Data status! berhasil di delete.'
    );

    return redirect()->route('statuses.index');
  }

  /**
   * Generate resource slug otomatis.
   */
  public function slug(Request $request)
  {
    $slug = SlugService::createSlug(
      Status::class,
      'slug',
      $request->name
    );

    return response()->json(['slug' => $slug]);
  }
}
