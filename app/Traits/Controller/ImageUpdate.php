<?php

namespace App\Traits\Controller;

use Illuminate\Support\Facades\Storage;

trait ImageUpdate
{
  public function handleImageUpdate(
    $request,
    $model,
    $field = 'image',
    $path = 'uploads'
  ) {
    if ($request->hasFile($field)) {
      if (!empty($model->$field)) {
        Storage::delete($model->$field);
      }

      return $request->file($field)->store($path);
    }

    return $model->$field;
  }
}
