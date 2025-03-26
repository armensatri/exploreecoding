<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Builder;

class Searching
{
  public static function ApplySearch(
    Builder $query,
    ?string $search,
    array $fields,
    array $relations = []
  ) {
    $query->where(function ($query) use ($search, $fields, $relations) {
      foreach ($fields as $field) {
        $query->orWhere($field, 'like', '%' . $search . '%');
      }

      foreach ($relations as $relation => $relationField) {
        $query->orWhereHas(
          $relation,
          function ($query) use ($search, $relationField) {
            $query->where($relationField, 'like', '%' . $search . '%');
          }
        );
      }
    });
  }
}
