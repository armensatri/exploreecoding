<?php

namespace App\Traits\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

trait ImageUpdate
{
  public function handleImageUpdate(
    Request $request,
    Model $model,
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
