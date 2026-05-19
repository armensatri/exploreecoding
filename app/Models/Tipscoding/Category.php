<?php

namespace App\Models\Tipscoding;

use App\Helpers\RandomUrl;
use App\Models\Tipscoding\Tipscoding;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Traits\Models\{
  HasSearchable,
  HasCacheVersion,
};

class Category extends Model
{
  use HasCacheVersion;
  use HasSearchable, HasFactory;

  protected $table = 'categories';

  protected $fillable = [
    'sc',
    'name',
    'slug',
    'image',
    'url',
  ];

  protected $sFields = [
    'name'
  ];

  public function getRouteKeyName()
  {
    return 'url';
  }

  public function tipscodings()
  {
    return $this->hasMany(Tipscoding::class);
  }

  protected static function bootHasRandomUrl()
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
