<?php

namespace App\Traits\Models;

use App\Helpers\RandomUrl;
use Illuminate\Database\Eloquent\Model;

trait HasRandomUrl
{
  protected static function RandomUrl(): void
  {
    static::creating(function (Model $model) {
      if (empty($model->url)) {
        do {
          $url = RandomUrl::generateUrl();
        } while ($model->newQuery()->where('url', $url)->exists());

        $model->url = $url;
      }
    });
  }
}
