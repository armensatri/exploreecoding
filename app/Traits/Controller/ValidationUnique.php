<?php

namespace App\Traits\Controller;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

trait ValidationUnique
{
  public function fieldUnique(
    FormRequest $request,
    Model $model,
    array $fields,
    array $messages = [],
    ?string $table = null
  ): void {
    $table = $table ?? $model->getTable();
    $rules = [];

    foreach ($fields as $field) {
      if ($request->$field != $model->$field) {
        $rules[$field] = "unique:{$table},{$field}," . $model->id;
      }
    }

    if (!empty($rules)) {
      $request->validate($rules, $messages);
    }
  }
}
