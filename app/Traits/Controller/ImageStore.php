<?php

namespace App\Traits\Controller;

trait ImageStore
{
  public function handleImageStore(
    $request,
    $field = 'image',
    $path = 'uploads'
  ) {
    if ($request->hasFile($field)) {
      return $request->file($field)->store($path, 'public');
    }

    return null;
  }
}
