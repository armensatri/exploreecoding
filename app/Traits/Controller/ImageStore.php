<?php

namespace App\Traits\Controller;

use Illuminate\Http\Request;

trait ImageStore
{
  public function handleImageStore(
    Request $request,
    $field = 'image',
    $path = 'uploads'
  ) {
    if ($request->hasFile($field)) {
      return $request->file($field)->store($path, 'public');
    }

    return null;
  }
}
