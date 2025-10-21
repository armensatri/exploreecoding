<?php

namespace App\Traits\Controllers;

use Illuminate\Foundation\Http\FormRequest;

trait ValidationUnique
{
  public function fieldUnique(
    FormRequest $request,
    $model,
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
